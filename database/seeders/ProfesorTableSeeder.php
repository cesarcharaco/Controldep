<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('periodos')->insert([
            'periodo' => 'Otoño 2022'
        ]);
        \DB::table('periodos')->insert([
            'periodo' => 'Primavera 2022'
        ]);
        \DB::table('profesores')->insert([
        	['profesor' => 'AGUIRRE AGUIRRE EUGENIO', 'rut' => 12841861,'dv' => 'k','telefono' => '99999999999', 'correo' => 'eugenio.aguirre02@inacapmail.cl','id_usuario' => 2],
        	['profesor' => 'AGUIRRE ROBLEDO SEBASTIÁN ALEXANDER', 'rut' => 17194557,'dv' => '7','telefono' => '88888888888', 'correo' => 'sebastian.aguirre08@inacapmail.cl','id_usuario' => 3],
        	['profesor' => 'ALBARRAN MONZON ENZOL ENRIQUE', 'rut' => 26074412,'dv' => '7','telefono' => '77777777777', 'correo' => 'enzol.albarran@inacapmail.cl','id_usuario' => 4],
        	['profesor' => 'ARACENA SEPULVEDA JAVIER IVAN', 'rut' => 10515871,'dv' => '8','telefono' => '66666666666', 'correo' => 'javier.aracena@inacapmail.cl','id_usuario' => 5],
        	['profesor' => 'ARANCIBIA SILVA LEONARDO', 'rut' => 6671148,'dv' => 'k','telefono' => '55555555555', 'correo' => 'leonardo.arancibia02@inacapmail.cl','id_usuario' => 6],
        	['profesor' => 'ARAYA CORTÉS CRISTIAN ANDRÉS', 'rut' => 18138820,'dv' => 'k','telefono' => '55555555555', 'correo' => 'cristian.araya59@inacapmail.cl','id_usuario' => 7],
            ['profesor' => 'BRUNET ANSALDO PAULINA SORELLA', 'rut' => 15069768,'dv' => '9','telefono' => '55555555555', 'correo' => 'paulina.brunet@inacapmail.cl','id_usuario' => 8],
            ['profesor' => 'CHARPENTIER OCHOA MAURICIO ANDRÉS', 'rut' => 18844974,'dv' => '3','telefono' => '55555555555', 'correo' => 'mauricio.charpentier@inacapmail.cl','id_usuario' => 9],
            ['profesor' => 'CONTRERAS ALVAREZ CLAUDIA MICHELLE', 'rut' => 15871099,'dv' => '4','telefono' => '55555555555', 'correo' => 'claudia.contreras25@inacapmail.cl','id_usuario' => 10],
            ['profesor' => 'CONTRERAS CARVAJAL RICARDO ANTONIO', 'rut' => 11469516,'dv' => '5','telefono' => '55555555555', 'correo' => 'ricardo.contreras21@inacapmail.cl','id_usuario' => 11],
            ['profesor' => 'CÓRDOVA TAPIA RAÚL CLAUDIO', 'rut' => 6054508,'dv' => '1','telefono' => '55555555555', 'correo' => 'raul.cordova02@inacapmail.cl','id_usuario' => 12],
            ['profesor' => 'CUBILLOS QUEZADA MAURICIO ALLEJANDRO', 'rut' => 12841948,'dv' => '9','telefono' => '55555555555', 'correo' => 'cubillosmauricio13@example.com','id_usuario' => 13],
            ['profesor' => 'ESCOBAR GUTIÉRREZ JUAN PABLO', 'rut' => 15434019,'dv' => 'k','telefono' => '55555555555', 'correo' => 'juan.escobar23@inacapmail.cl','id_usuario' => 14],
            ['profesor' => 'ESQUIVEL GONZÁLEZ LEONARDO ANDRÉS', 'rut' => 18141451,'dv' => '0','telefono' => '55555555555', 'correo' => 'leonardo.esquivel@inacapmail.cl','id_usuario' => 15],
            ['profesor' => 'FUENTES CÁCERES MAURICIO ERNESTO', 'rut' => 15869324,'dv' => '0','telefono' => '55555555555', 'correo' => 'mauricio.fuentes08@inacapmail.cl','id_usuario' => 16],
            ['profesor' => 'GOMEZ POBLETE JESSICA ANDREA  ', 'rut' => 15030553,'dv' => '5','telefono' => '55555555555', 'correo' => 'jessica.gomez@inacapmail.cl','id_usuario' => 17],
            ['profesor' => 'GUERRERO VEGA OSCAR OMAR', 'rut' => 6501042,'dv' => '9','telefono' => '55555555555', 'correo' => 'oscar.guerrero@inacapmail.cl','id_usuario' => 18],
            ['profesor' => 'IRIARTE CASTRO PABLO CESAR', 'rut' => 17606095,'dv' => '6','telefono' => '55555555555', 'correo' => 'pablo.iriarte@inacapmail.cl','id_usuario' => 19],
            ['profesor' => 'JELDES CERDA CRISTIAN ANDRÉS', 'rut' => 15611131,'dv' => '7','telefono' => '55555555555', 'correo' => 'cristian.jeldes@inacapmail.cl','id_usuario' => 20],
            ['profesor' => 'LAGOS MANRÍQUEZ LEONARDO ENRIQUE', 'rut' => 13143959,'dv' => '8','telefono' => '55555555555', 'correo' => 'leonardo.lagos@inacapmail.cl','id_usuario' => 21],
            ['profesor' => 'MONTALBÁN GONZÁLEZ SEBASTIÁN DAVID', 'rut' => 17195159,'dv' => '3','telefono' => '55555555555', 'correo' => 'sebastian.montalban02@inacapmail.cl','id_usuario' => 22],
            ['profesor' => 'MORALES CASTRO FRANCO LUIS', 'rut' => 12163739,'dv' => '1','telefono' => '55555555555', 'correo' => 'franco.morales@inacapmail.cl','id_usuario' => 23],
            ['profesor' => 'NARRIA COLLAO CRISTIAN GUILLERMO', 'rut' => 10990230,'dv' => '6','telefono' => '55555555555', 'correo' => 'cristian.narria@inacapmail.cl','id_usuario' => 24],
            ['profesor' => 'NÚÑEZ MANCILLA DANIELA ALEJANDRA', 'rut' => 16103283,'dv' => '2','telefono' => '55555555555', 'correo' => 'daniela.nunez13@inacapmail.cl','id_usuario' => 25],
            ['profesor' => 'NÚÑEZ ARANCIBIA MARÍA INÉS DEL CARMEN', 'rut' => 12651188,'dv' => '4','telefono' => '55555555555', 'correo' => 'maria.nunez05@inacapmail.cl','id_usuario' => 26],
            ['profesor' => 'OLIVARES ROJAS AURISTELA DEL CARMEN', 'rut' => 10056459,'dv' => '9','telefono' => '55555555555', 'correo' => 'auristela.olivares@inacapmail.cl','id_usuario' => 27],
            ['profesor' => 'PARRA LUNA WLADIMIR ESTEBAN', 'rut' => 17434604,'dv' => '6','telefono' => '55555555555', 'correo' => 'wladimir.parra@inacapmail.cl','id_usuario' => 28],
            ['profesor' => 'PIZARRO TAPIA LEONARDO JAVIER', 'rut' => 17626442,'dv' => 'k','telefono' => '55555555555', 'correo' => 'leonardo.pizarro04@inacapmail.cl','id_usuario' => 29],
            ['profesor' => 'RALPH VÁSQUEZ JORGE ELISEO', 'rut' => 12259802,'dv' => '0','telefono' => '55555555555', 'correo' => 'jorge.ralf@inacapmail.cl','id_usuario' => 30],
            ['profesor' => 'ROJAS GONZALEZ ALEJANDRO ANDRES', 'rut' => 18710757,'dv' => '1','telefono' => '55555555555', 'correo' => 'alejandro.rojas34@inacapmail.cl','id_usuario' => 31],
            ['profesor' => 'ROJAS NÚÑEZ MATÍAS IGNACIO', 'rut' => 18970356,'dv' => '2','telefono' => '55555555555', 'correo' => 'matias.rojas36@inacapmail.cl','id_usuario' => 32],
            ['profesor' => 'SAN FRANCISCO CARCAMO MADELYN GISSELLE', 'rut' => 16833717,'dv' => '5','telefono' => '55555555555', 'correo' => 'madelyn.sanfrancisco@inacapmail.cl','id_usuario' => 33],
            ['profesor' => 'SERAZZI CHIANG ANGELO ENRIQUE', 'rut' => 9368208,'dv' => '4','telefono' => '55555555555', 'correo' => 'angelo.serazzi@inacapmail.cl','id_usuario' => 34],
            ['profesor' => 'URQUIETA NILO FABIÁN ANDRÉS', 'rut' => 14003587,'dv' => '4','telefono' => '55555555555', 'correo' => 'fabian.urquieta@inacapmail.cl','id_usuario' => 35],
            ['profesor' => 'VALENZUELA URIBE CARLOS RUBÉN', 'rut' => 9175266,'dv' => '2','telefono' => '55555555555', 'correo' => 'carlos.valenzuela04@inacapmail.cl','id_usuario' => 36],
            ['profesor' => 'VEGA BERRIOS PATRICIA FABIOLA', 'rut' => 13222751,'dv' => '9','telefono' => '55555555555', 'correo' => 'patricia.vega08@inacapmail.cl','id_usuario' => 37],
            ['profesor' => 'VEGA CARRIZO FERNANDO ANDRÉS', 'rut' => 19504817,'dv' => '7','telefono' => '55555555555', 'correo' => 'fernando.vega18@inacapmail.cl','id_usuario' => 38],
            ['profesor' => 'VELÁSQUEZ BARAHONA ERIK', 'rut' => 9951366,'dv' => '7','telefono' => '55555555555', 'correo' => 'erik.velasquez@inacapmail.cl','id_usuario' => 39],
            ['profesor' => 'VIGNEAUX GONZALEZ RENE FRANCISCO', 'rut' => 10135937,'dv' => '9','telefono' => '55555555555', 'correo' => 'rene.vigneaux@inacapmail.cl','id_usuario' => 40]
        ]);
    }
}
