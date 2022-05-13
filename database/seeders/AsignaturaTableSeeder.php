<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('asignaturas')->insert([
        	['codigo' => 'FGIN01', 'asignatura' => 'Inglés I', 'id_programa' => 1],
        	['codigo' => 'IDEN02', 'asignatura' => 'Inglés II', 'id_programa' => 1],
        	['codigo' => 'FGFC03', 'asignatura' => 'Formación Ciudadana', 'id_programa' => 1],
        	['codigo' => 'GEPE01', 'asignatura' => 'Preparación y Evaluación de Proyectos', 'id_programa' => 1],
        	['codigo' => 'TESM01', 'asignatura' => 'Diagnóstico y Selección de Motores', 'id_programa' => 1],
        	['codigo' => 'DCMS11', 'asignatura' => 'Mecánica de Servicio Técnico', 'id_programa' => 1],
        	['codigo' => 'GEAP01', 'asignatura' => 'Administración y Productividad', 'id_programa' => 1],
        	['codigo' => 'DBMT01', 'asignatura' => 'Matemática II', 'id_programa' => 1],
        	['codigo' => 'GMON22', 'asignatura' => 'Sistemas OleoHidráulicos y Neumáticos de Maquinaria', 'id_programa' => 1],
        	['codigo' => 'ATAD01', 'asignatura' => 'Administración', 'id_programa' => 1],
        	['codigo' => 'TEFT01', 'asignatura' => 'Fundamentos de Termodinámica', 'id_programa' => 1],
        	['codigo' => 'MTAE02', 'asignatura' => 'Resolución de Problemas de Álgebra', 'id_programa' => 1],
        	['codigo' => 'TEEH01', 'asignatura' => 'Sistemas Electrohidráulicos', 'id_programa' => 1],
        	['codigo' => 'GMAM42', 'asignatura' => 'Mantenimiento de Sistemas de Automatización y Control de Maquinaria', 'id_programa' => 1],
        	['codigo' => 'GMLM41', 'asignatura' => 'Mantenimiento de Sistemas de Lubricación en Maquinaria', 'id_programa' => 1],
        	['codigo' => 'ETAD01', 'asignatura' => 'Análisis Estadístico de Datos', 'id_programa' => 1],
        	['codigo' => 'ENME02', 'asignatura' => 'Inglés Mecánica II', 'id_programa' => 1],
        	['codigo' => 'TEMF01', 'asignatura' => 'Mecánica de Fluidos', 'id_programa' => 1],
        	['codigo' => 'DCOT13', 'asignatura' => 'Organización del Taller Mecánico', 'id_programa' => 1],
        	['codigo' => 'TESC01', 'asignatura' => 'Sistemas de Control Aplicado', 'id_programa' => 1],
        	['codigo' => 'TEAC01', 'asignatura' => 'Diseño Asistido por Computador', 'id_programa' => 1],
        	['codigo' => 'DCEA12', 'asignatura' => 'Electricidad Aplicada a Sistemas Móviles', 'id_programa' => 1],
        	['codigo' => 'FGIE01', 'asignatura' => 'Innovación y Emprendimiento I', 'id_programa' => 1],
        	['codigo' => 'GEIN01', 'asignatura' => 'Intraemprendimiento', 'id_programa' => 1],
        	['codigo' => 'TERM01', 'asignatura' => 'Resistencia de Materiales y Elementos de Máquinas', 'id_programa' => 1],
        	['codigo' => 'GMMD31', 'asignatura' => 'Diagnóstico Electrónico de Motores Diésel', 'id_programa' => 1],
        	['codigo' => 'GMTP33', 'asignatura' => 'Tecnología de Transmisión de Potencia', 'id_programa' => 1],
        	['codigo' => 'GMCH24', 'asignatura' => 'Grupo Chásis de Maquinaria', 'id_programa' => 1],
        	['codigo' => 'GMEA23', 'asignatura' => 'Electrónica Aplicada a Maquinaria Pesada', 'id_programa' => 1],
        	['codigo' => 'HITI35', 'asignatura' => 'Taller Integrado de Servicio y Mantenimiento I', 'id_programa' => 1],
        	['codigo' => 'HITI45', 'asignatura' => 'Taller Integrado de Servicio y Mantenimiento II', 'id_programa' => 1],
        	['codigo' => 'TEHA01', 'asignatura' => 'Hidroneumática Aplicada', 'id_programa' => 1],
        	['codigo' => 'MTFG01', 'asignatura' => 'Funciones y Geometría', 'id_programa' => 1],
        	['codigo' => 'GMTM43', 'asignatura' => 'Sistemas de Tracción de Maquinaria', 'id_programa' => 1],


        	['codigo' => 'FGAU01', 'asignatura' => 'Autogestión', 'id_programa' => 2],
        	['codigo' => 'FGCE01', 'asignatura' => 'Comunicación Efectiva', 'id_programa' => 2],
        	['codigo' => 'ECCC01', 'asignatura' => 'Control y Comando Eléctrico', 'id_programa' => 2],
        	['codigo' => 'ECEE01', 'asignatura' => 'Electricidad y Electrónica Aplicada I', 'id_programa' => 2],
        	['codigo' => 'EEFP01', 'asignatura' => 'Fundamentos de Programción', 'id_programa' => 2],
        	['codigo' => 'MOGM01', 'asignatura' => 'Gestión del Mantenimiento', 'id_programa' => 2],
        	['codigo' => 'IDEL01', 'asignatura' => 'Inglés Tecnológico', 'id_programa' => 2],
        	['codigo' => 'MOIE01', 'asignatura' => 'Introducción a Electromecánica', 'id_programa' => 2],
        	['codigo' => 'MTES01', 'asignatura' => 'Matemática Aplicada I', 'id_programa' => 2],
        	['codigo' => 'DCSE01', 'asignatura' => 'Sistemas Electrohidráulicos y Electroneumáticos', 'id_programa' => 2],
        	['codigo' => 'HITM01', 'asignatura' => 'Taller Electromecánico Integrado de Máquinas','id_programa' => 2],
        	

        	['codigo' => 'GEAP01', 'asignatura' => 'Administración y Productividad', 'id_programa' => 3],
        	['codigo' => 'GMMD31', 'asignatura' => 'Diagnóstico Electrónico de Motores Diésel', 'id_programa' => 3],
        	['codigo' => 'DCEA12', 'asignatura' => 'Electricidad Aplicada a Sistemas Móviles', 'id_programa' => 3],
        	['codigo' => 'MPEM01', 'asignatura' => 'Electrónica de Maquinaria Pesada', 'id_programa' => 3],
        	['codigo' => 'FGFC03', 'asignatura' => 'Formación Ciudadana', 'id_programa' => 3],
        	['codigo' => 'TEHA01', 'asignatura' => 'Hidroneumática Aplicada', 'id_programa' => 3],
        	['codigo' => 'FGIN01', 'asignatura' => 'Inglés I', 'id_programa' => 3],
        	['codigo' => 'ENME02', 'asignatura' => 'Inglés Mecánica II', 'id_programa' => 3],
        	['codigo' => 'FGIE01', 'asignatura' => 'Innovación y Emprendimiento I', 'id_programa' => 3],
        	['codigo' => 'GMAM42', 'asignatura' => 'Mantenimiento de Sistemas de Automatización y Control de Maquinaria', 'id_programa' => 3],
        	['codigo' => 'GMLM41', 'asignatura' => 'Mantenimiento de Sistemas de Lubricación en Maquinaria', 'id_programa' => 3],
        	['codigo' => 'GMON32', 'asignatura' => 'Mantenimiento de Sistemas Oleohidráulicos y Neumáticos', 'id_programa' => 3],
        	['codigo' => 'MPMP01', 'asignatura' => 'Maquinaria Pesada', 'id_programa' => 3],
        	['codigo' => 'DCMS11', 'asignatura' => 'Mecánica de Servicio Técnico', 'id_programa' => 3],
        	['codigo' => 'MPMD01', 'asignatura' => 'Motores Diésel', 'id_programa' => 3],
        	['codigo' => 'DCOT13', 'asignatura' => 'Organización del Taller Mecánico', 'id_programa' => 3],
        	['codigo' => 'MTAE02', 'asignatura' => 'Resolución de Problemas en Álgebra', 'id_programa' => 3],
        	['codigo' => 'GMTM43', 'asignatura' => 'Sistemas de Tracción de Maquinaria', 'id_programa' => 3],
        	['codigo' => 'HITI35', 'asignatura' => 'Taller Integrado de Servicio y Mantenimiento I', 'id_programa' => 3],
        	['codigo' => 'HITI45', 'asignatura' => 'Taller Integrado de Servicio y Mantenimiento II', 'id_programa' => 3],
        	['codigo' => 'GMTP33', 'asignatura' => 'Tecnología de Transmisión de Potencia ', 'id_programa' => 3],


        	['codigo' => 'GEAP01', 'asignatura' => 'Administración y Productividad ', 'id_programa' => 4],
        	['codigo' => 'GMMD31', 'asignatura' => 'Diagnóstico Electrónico de Motores Diésel', 'id_programa' => 4],
        	['codigo' => 'DCEA12', 'asignatura' => 'Electricidad Aplicada a Sistemas Móviles', 'id_programa' => 4],
        	['codigo' => 'MPEM01', 'asignatura' => 'Electrónica de Maquinaria Pesada', 'id_programa' => 4],
        	['codigo' => 'FGFC03', 'asignatura' => 'Formación Ciudadana', 'id_programa' => 4],
        	['codigo' => 'TEHA01', 'asignatura' => 'Hidroneumática Aplicada', 'id_programa' => 4],
        	['codigo' => 'FGIN01', 'asignatura' => 'Inglés I', 'id_programa' => 4],
        	['codigo' => 'IDEN02', 'asignatura' => 'Inglés Mecánica II', 'id_programa' => 4],
        	['codigo' => 'FGIE01', 'asignatura' => 'Innovación y Emprendimiento I', 'id_programa' => 4],
        	['codigo' => 'GMAM42', 'asignatura' => 'Mantenimiento de Sistemas de Automatización y Control de Maquinaria', 'id_programa' => 4],
        	['codigo' => 'GMLM41', 'asignatura' => 'Mantenimiento de Sistemas de Lubricación en Maquinaria', 'id_programa' => 4],
        	['codigo' => 'GMON32', 'asignatura' => 'Mantenimiento de Sistemas Oleohidráulicos y Neumáticos', 'id_programa' => 4],
        	['codigo' => 'MPMP01', 'asignatura' => 'Maquinaria Pesada', 'id_programa' => 4],
        	['codigo' => 'DCMS11', 'asignatura' => 'Mecánica de Servicio Técnico', 'id_programa' => 4],
        	['codigo' => 'MPMD01', 'asignatura' => 'Motores Diesel', 'id_programa' => 4],
        	['codigo' => 'DCOT13', 'asignatura' => 'Organización del Taller Mecánico', 'id_programa' => 4],
        	['codigo' => 'MTAE02', 'asignatura' => 'Resolución de Problemas en Álgebra', 'id_programa' => 4],
        	['codigo' => 'GMTM43', 'asignatura' => 'Sistemas de Tracción de Maquinaria', 'id_programa' => 4],
        	['codigo' => 'HITI35', 'asignatura' => 'Taller Integrado de Mantenimiento y Servicios I', 'id_programa' => 4],
        	['codigo' => 'HITI45', 'asignatura' => 'Taller Integrado de Mantenimiento y Servicios II', 'id_programa' => 4],
        	['codigo' => 'GMTP33', 'asignatura' => 'Tecnología de Transmisión de Potencia ', 'id_programa' => 4],
        	

        	['codigo' => 'MACR33', 'asignatura' => 'Conectividad y Redes del Automóvil', 'id_programa' => 5],
        	['codigo' => 'DCEA12', 'asignatura' => 'Electricidad Aplicada a Sistemas Móviles', 'id_programa' => 5],
        	['codigo' => 'FGFC03', 'asignatura' => 'Formación Ciudadana', 'id_programa' => 5],
        	['codigo' => 'HIIA35', 'asignatura' => 'Integración Automotriz I', 'id_programa' => 5],
        	['codigo' => 'DCMS11', 'asignatura' => 'Mecánica de Servicio Técnico', 'id_programa' => 5],
        	['codigo' => 'DCOT13', 'asignatura' => 'Organización del Taller Mecánico', 'id_programa' => 5],
        	['codigo' => 'MTAE02', 'asignatura' => 'Resolución de Problemas en Álgebra', 'id_programa' => 5],
        	['codigo' => 'MASM21', 'asignatura' => 'Sistemas de Motorización', 'id_programa' => 5],
        	['codigo' => 'MAST31', 'asignatura' => 'Sistemas de Transmisión', 'id_programa' => 5],
        	['codigo' => 'MAEA32', 'asignatura' => 'Sistemas Electrónicos del Automóvil', 'id_programa' => 5]

        ]);
    }
}
