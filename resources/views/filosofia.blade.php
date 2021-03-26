<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filosofia') }}
        </h2>
    </x-slot>

    <style>
        .hide {
          display: none;
        }
            
        .myDIV:hover + .hide {
          display: inline;
          
        }

    </style>
    <div style="padding: 30px;text-align: center;margin-left: 15rem;margin-right: 15rem;">



        <?php 
            //$userId = Auth::id();
            //echo ($userId);


        for ($a=1; $a < 1000; $a++) { 
            
        
            

            $users = DB::select('SELECT * FROM enunciados WHERE enu_codigo = ? AND enu_mat_codigo = 4' , [$a]);
            
            $alts = DB::select('SELECT * FROM alternativas WHERE alt_enu_codigo = ?' , [$a]);


        foreach ($users as $user) {
            ?><h1 style="font-weight: bold; font-size: 1.3rem; text-align: justify; margin-bottom: 10px;padding: 5px;"><?php

            echo $user->enu_nome."<br>"; 

            ?></h1> <?php

            foreach ($alts as $alt) {
                ?> <h2 style="padding: 5px;text-align: justify; font-size: 1.2rem;"> <?php
                echo $alt->alt_nome."<br>"; 
                ?> </h2> <?php
            }
            foreach ($users as $user) {
                ?> <h2 style="padding: 5px;text-align: justify;"> <?php
                
                ?><h2 class="myDIV" style=" display: inline;font-weight: bold;font-size: 1.3rem;"> <?php echo "Resposta: "; ?> 
                
                <h2 class="hide" style="font-size: 1.3rem;"> <?php echo $user->enu_correcao; ?> </h2> </h2>

                </h2> <hr> <br> <?php
            }

        }
    }

            ?>

    </div>
    
</x-app-layout>
