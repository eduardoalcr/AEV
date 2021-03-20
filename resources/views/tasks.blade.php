<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matérias') }}
        </h2>
    </x-slot>

    <div style="padding: 30px;text-align: center;">


        <?php 
            //$userId = Auth::id();
            //echo ($userId);

            $users = DB::select('SELECT * FROM enunciados WHERE enu_codigo = ?' , ['1']);
            
            $alts = DB::select('SELECT * FROM alternativas WHERE alt_enu_codigo = ?' , ['1']);


            foreach ($users as $user) {
            
            echo $user->enu_nome."<br>"; 

            foreach ($alts as $alt) {

            echo $alt->alt_nome."<br>"; 

        }







        }
            ?>

    </div>
    
</x-app-layout>
