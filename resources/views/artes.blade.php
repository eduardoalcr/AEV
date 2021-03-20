<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matérias') }}
        </h2>
    </x-slot>

    <div style="padding: 30px;text-align: center;background-color: lightgray;margin-left: 15rem;margin-right: 15rem;">

        <?php 
            //$userId = Auth::id();
            //echo ($userId);


        for ($a=1; $a < 15; $a++) { 
                       
            $users = DB::select('SELECT * FROM enunciados WHERE enu_codigo = ? AND enu_mat_codigo = 5' , [$a]);
            
            $alts = DB::select('SELECT * FROM alternativas WHERE alt_enu_codigo = ?' , [$a]);


        foreach ($users as $user) {
            ?><h1 style="font-weight: bold; font-size: 1.3rem;"><?php

            echo $user->enu_nome."<br>"; 

            ?></h1> <?php

            foreach ($alts as $alt) {
                ?> <h2 style="padding: 5px;"> <?php
                echo $alt->alt_nome."<br>"; 
                ?> </h2> <?php
            }
            foreach ($users as $user) {
                ?><h2 style="color:green;"> <?php
                echo "Resposta: ";
                echo $user->enu_correcao."<br><br>"; 
                ?></h2> <?php
            }

        }
    }

            ?>

    </div>
    
</x-app-layout>
