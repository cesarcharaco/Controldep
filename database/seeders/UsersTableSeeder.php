<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'ealbarran@inacap.cl',
            'password' => bcrypt('Admin2022.'),
            'user_type' => 'Admin',
        ]);
            
        \DB::table('users')->insert([
            'name' => 'AGUIRRE  AGUIRRE EUGENIO',
            'email' => 'eugenio.aguirre02@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        
        \DB::table('users')->insert([
            'name' => 'AGUIRRE ROBLEDO SEBASTIÁN ALEXANDER',
            'email' => 'sebastian.aguirre08@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ALBARRAN MONZON ENZOL ENRIQUE',
            'email' => 'enzol.albarran@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARACENA SEPULVEDA JAVIER IVAN',
            'email' => 'javier.aracena@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARANCIBIA SILVA LEONARDO',
            'email' => 'leonardo.arancibia02@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARAYA CORTÉS CRISTIAN ANDRÉS',
            'email' => 'cristian.araya59@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'BRUNET ANSALDO PAULINA SORELLA',
            'email' => 'paulina.brunet@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CHARPENTIER OCHOA MAURICIO ANDRÉS',
            'email' => 'mauricio.charpentier@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CONTRERAS ALVAREZ CLAUDIA MICHELLE',
            'email' => 'claudia.contreras25@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CONTRERAS CARVAJAL RICARDO ANTONIO',
            'email' => 'ricardo.contreras21@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CÓRDOVA TAPIA RAÚL CLAUDIO',
            'email' => 'raul.cordova02@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CUBILLOS QUEZADA MAURICIO ALLEJANDRO',
            'email' => 'mauricio.cubillos@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ESCOBAR GUTIÉRREZ JUAN PABLO',
            'email' => 'juan.escobar23@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ESQUIVEL GONZÁLEZ LEONARDO ANDRÉS',
            'email' => 'leonardo.esquivel@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'FUENTES CÁCERES MAURICIO ERNESTO',
            'email' => 'mauricio.fuentes08@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'GOMEZ POBLETE JESSICA ANDREA  ',
            'email' => 'jessica.gomez@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'GUERRERO VEGA OSCAR OMAR',
            'email' => 'oscar.guerrero@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'IRIARTE CASTRO PABLO CESAR  ',
            'email' => 'pablo.iriarte@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'JELDES CERDA CRISTIAN ANDRÉS',
            'email' => 'cristian.jeldes@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'LAGOS MANRÍQUEZ LEONARDO ENRIQUE',
            'email' => 'leonardo.lagos@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'MONTALBÁN GONZÁLEZ SEBASTIÁN DAVID',
            'email' => 'sebastian.montalban02@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'MORALES CASTRO FRANCO LUIS',
            'email' => 'franco.morales@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NARRIA COLLAO CRISTIAN GUILLERMO',
            'email' => 'cristian.narria@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NÚÑEZ MANCILLA DANIELA ALEJANDRA',
            'email' => 'daniela.nunez13@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NÚÑEZ ARANCIBIA MARÍA INÉS DEL CARMEN',
            'email' => 'maria.nunez05@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'OLIVARES ROJAS AURISTELA DEL CARMEN',
            'email' => 'auristela.olivares@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'PARRA LUNA WLADIMIR ESTEBAN',
            'email' => 'wladimir.parra@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'PIZARRO TAPIA LEONARDO JAVIER',
            'email' => 'leonardo.pizarro04@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'RALPH VÁSQUEZ JORGE ELISEO',
            'email' => 'jorge.ralf@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ROJAS GONZALEZ ALEJANDRO ANDRES',
            'email' => 'alejandro.rojas34@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ROJAS NÚÑEZ MATÍAS IGNACIO',
            'email' => 'matias.rojas36@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'SAN FRANCISCO CARCAMO MADELYN GISSELLE',
            'email' => 'madelyn.sanfrancisco@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'SERAZZI CHIANG ANGELO ENRIQUE',
            'email' => 'angelo.serazzi@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'URQUIETA NILO FABIÁN ANDRÉS',
            'email' => 'fabian.urquieta@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VALENZUELA URIBE CARLOS RUBÉN',
            'email' => 'carlos.valenzuela04@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VEGA BERRIOS PATRICIA FABIOLA',
            'email' => 'patricia.vega08@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VEGA CARRIZO FERNANDO ANDRÉS',
            'email' => 'fernando.vega18@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VELÁSQUEZ BARAHONA ERIK',
            'email' => 'erik.velasquez@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VIGNEAUX GONZALEZ RENE FRANCISCO',
            'email' => 'rene.vigneaux@inacapmail.cl',
            'password' => bcrypt('Sime2022.'),
            'user_type' => 'Profesor',
        ]);

    }
}
