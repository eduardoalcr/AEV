<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('O que vamos fazer hoje?') }}
        </h2>

    </x-slot>

    <style>
        #laink {
            font-size: 2.5rem; 
            padding: 10px;
        }
        #fraseUm {
            font-weight: bold;
            font-size: 3rem;
        }
        #mainDiv {
            
            text-align: center;
            margin-top: 15%;
            margin-left: 20%;
            margin-right: 20%;
           

        }
        


    </style>

    
    <div id="mainDiv">
        <label id="fraseUm">Escolha uma matéria</label>
        <br>
        <?php 
            //$userId = Auth::id();
            //echo ($userId);
            $users = DB::table('materias')->get();

            foreach ($users as $user) {
            ?>
            <a href="<?php echo $user->mat_nome; ?>-page" id="laink">
                <?php
            echo $user->mat_nome; 
                ?>
            </a>
            <?php } ?>
              
          </div>
      
</x-app-layout>
