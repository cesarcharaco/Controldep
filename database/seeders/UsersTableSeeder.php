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
            'email' => 'admin@comercialboreal.cl',
            'password' => bcrypt('Admin2022.'),
            'user_type' => 'Admin',
        ]);
            
        \DB::table('users')->insert([
            'name' => 'AGUIRRE  AGUIRRE EUGENIO',
            'email' => 'aguirreeugenio2@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        
        \DB::table('users')->insert([
            'name' => 'AGUIRRE ROBLEDO SEBASTIÁN ALEXANDER',
            'email' => 'aguirresebastian3@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ALBARRAN MONZON ENZOL ENRIQUE',
            'email' => 'albarranenzol4@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARACENA SEPULVEDA JAVIER IVAN',
            'email' => 'aracenajavier5@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARANCIBIA SILVA LEONARDO',
            'email' => 'arancibiasilva6@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ARAYA CORTÉS CRISTIAN ANDRÉS',
            'email' => 'arayacristian7@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'BRUNET ANSALDO PAULINA SORELLA',
            'email' => 'brunetpaulina8@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CHARPENTIER OCHOA MAURICIO ANDRÉS',
            'email' => 'charpentiermauricio9@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CONTRERAS ALVAREZ CLAUDIA MICHELLE',
            'email' => 'contrerasclaudia10@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CONTRERAS CARVAJAL RICARDO ANTONIO',
            'email' => 'contrerasricardo11@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CÓRDOVA TAPIA RAÚL CLAUDIO',
            'email' => 'cordovaraul12@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'CUBILLOS QUEZADA MAURICIO ALLEJANDRO',
            'email' => 'cubillosmauricio13@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ESCOBAR GUTIÉRREZ JUAN PABLO',
            'email' => 'escobarjuan14@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'FUENTES CÁCERES MAURICIO ERNESTO',
            'email' => 'fuentesmauricio15@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'GOMEZ POBLETE JESSICA ANDREA  ',
            'email' => 'gomezjessica16@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'GUERRERO VEGA OSCAR OMAR',
            'email' => 'guerrerooscar17@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'IRIARTE CASTRO PABLO CESAR  ',
            'email' => 'iriartepablo18@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'JELDES CERDA CRISTIAN ANDRÉS',
            'email' => 'jeldescristian19@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'LAGOS MANRÍQUEZ LEONARDO ENRIQUE',
            'email' => 'lagosleonardo20@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'MONTALBÁN GONZÁLEZ SEBASTIÁN DAVID',
            'email' => 'montalbansebastian21@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'MORALES CASTRO FRANCO LUIS',
            'email' => 'moralesfranco22@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NARRIA COLLAO CRISTIAN GUILLERMO',
            'email' => 'narriacristian23@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NÚÑEZ ARANCIBIA MARÍA INÉS DEL CARMEN',
            'email' => 'nunezmaria24@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'NÚÑEZ MANCILLA DANIELA ALEJANDRA',
            'email' => 'nunezdaniela25@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'OLIVARES ROJAS AURISTELA DEL CARMEN',
            'email' => 'olivaresauristela26@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'PARRA LUNA WLADIMIR ESTEBAN',
            'email' => 'parrawladimir27@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'PIZARRO TAPIA LEONARDO JAVIER',
            'email' => 'pizarroleonardo28@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'RALPH VÁSQUEZ JORGE ELISEO',
            'email' => 'ralphjorge29@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ROJAS GONZALEZ ALEJANDRO ANDRES',
            'email' => 'rojasalejandro30@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'ROJAS NÚÑEZ MATÍAS IGNACIO',
            'email' => 'rojasmatias31@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'SAN FRANCISCO CARCAMO MADELYN GISSELLE',
            'email' => 'sanfranciscomadelyn32@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'SERAZZI CHIANG ANGELO ENRIQUE',
            'email' => 'serazziangelo33@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'URQUIETA NILO FABIÁN ANDRÉS',
            'email' => 'urquietafabian34@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VALENZUELA URIBE CARLOS RUBÉN',
            'email' => 'valenzuelacarlos35@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VEGA BERRIOS PATRICIA FABIOLA',
            'email' => 'vegapatricia36@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VEGA CARRIZO FERNANDO ANDRÉS',
            'email' => 'vegafernando37@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VELÁSQUEZ BARAHONA ERIK',
            'email' => 'velasquezerik38@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);
        \DB::table('users')->insert([
            'name' => 'VIGNEAUX GONZALEZ RENE FRANCISCO',
            'email' => 'vigneauxrene39@example.com',
            'password' => bcrypt('Controldep2022.'),
            'user_type' => 'Profesor',
        ]);

    }
}
