<?php
class Seguimiento{
    private $nombrecorto;

    private $db;

    public function __construct(){
        $this->db = Database::connectmoodle();
    }

    public function getNombrecorto(){
        return $this->nombrecorto;
    }
    public function setNombrecorto($nc){
        $this->nombrecorto = $nc;
    }
    public function seguimiento($idcp){
      $sql = "SELECT DISTINCT  c.shortname ide, c.fullname ,l.userid, uss.firstname, uss.lastname,
              uss.email, cats.name as Semestre,
              cats.path, c.shortname ide ,c.fullname curso,
              COALESCE( TA.archivos, 0 )as Archivos,
              COALESCE( TB.tareas, 0 ) as Tareas,
              COALESCE( TC.cuestionarios, 0 ) as Cuestionarios,
              COALESCE( TD.encuesta, 0 ) as encuesta,
              COALESCE( TE.etiquetas, 0 ) as etiquetas,
              COALESCE( TF.chat, 0 ) as chat,
              COALESCE( TG.forum, 0 ) as forum,
              COALESCE( TH.glosary, 0 ) as glosary,
              COALESCE( TH.glosary, 0 ) as  lesson, cats.path
              from mdl_course c

              JOIN mdl_context AS ctx ON ctx.instanceid=c.id
              JOIN mdl_role_assignments AS ra ON ra.contextid = ctx.id
              JOIN mdl_user_lastaccess as l ON ra.userid = l.userid
              join mdl_user as uss on uss.id=l.userid
              JOIN mdl_course_categories AS cats ON c.category = cats.id

              LEFT JOIN
              (SELECT c.id AS curso, COUNT(r.id) AS archivos
              FROM mdl_course c
              INNER JOIN mdl_resource r ON r.course = c.id
               GROUP BY c.id) TA
              ON c.id=TA.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS tareas
              FROM mdl_course c
              INNER JOIN mdl_assign a ON a.course = c.id
                GROUP BY c.id) TB
              ON c.id=TB.curso
              LEFT JOIN
              (SELECT c.id AS curso,  COUNT(q.id) AS cuestionarios
              FROM mdl_course c
              INNER JOIN mdl_quiz q ON q.course = c.id
                GROUP BY c.id) TC
              ON c.id=TC.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS encuesta
              FROM mdl_course c
              INNER JOIN mdl_survey a ON a.course = c.id
                GROUP BY c.id) TD
              ON c.id=TD.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS etiquetas
              FROM mdl_course c
              INNER JOIN mdl_label a ON a.course = c.id
                GROUP BY c.id) TE
              ON c.id=TE.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS chat
              FROM mdl_course c
              INNER JOIN mdl_chat a ON a.course = c.id
                GROUP BY c.id) TF
              ON c.id=TF.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS forum
              FROM mdl_course c
              INNER JOIN mdl_forum a ON a.course = c.id
                GROUP BY c.id) TG
              ON c.id=TG.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS glosary
              FROM mdl_course c
              INNER JOIN mdl_glossary a ON a.course = c.id
                GROUP BY c.id) TH
              ON c.id=TH.curso
              LEFT JOIN
              (SELECT c.id AS curso, COUNT(a.id) AS lesson
              FROM mdl_course c
              INNER JOIN mdl_lesson a ON a.course = c.id
                GROUP BY c.id) TI
              ON c.id=TI.curso

              WHERE c.category=cats.id

              AND c.shortname = '$idcp'";

              $seguipers = $this->db->query($sql);

              return $seguipers;
    }

}

?>
