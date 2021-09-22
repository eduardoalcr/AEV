<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php 
            $usuario = Auth::id();
            if ($usuario == 42) {
                 echo "Admin";
             }else{
                echo "Questões aleatórias";
             } 

            ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

        <form method="POST" action="{{route('tasks.index')}}">
        @csrf

        
<?php
    
            $materias = DB::select('SELECT * FROM materias');
            $userId = Auth::id();
            
            if ($userId == 1){
                
                ?> <select name="materia">
    <option value="10" selected>Escolha uma matéria</option>
    <?php
    foreach ($materias as $materia) {
    ?>

  <option value="<?php echo $materia->mat_codigo ?>"><?php echo $materia->mat_nome ?></option>

<?php } ?>
</select>
        <br><br>
        <textarea name="enun" rows="5" cols="70" placeholder="Insira o enunciado da questão" style="width: 100%;"></textarea>
        <br><br>
        
        <textarea name="correcao" rows="2" cols="70" placeholder="Insira a questão correta aqui" style="width: 100%;"></textarea>
        <br><br>

        <textarea name="qa" rows="2" cols="70" placeholder="Insira a alternativa A)" style="width: 100%;"></textarea>
        <br><br>

        <textarea name="qb" rows="2" cols="70" placeholder="Insira a alternativa B)" style="width: 100%;"></textarea>
        <br><br>

        <textarea name="qc" rows="2" cols="70" placeholder="Insira a alternativa C)" style="width: 100%;"></textarea>
        <br><br>

        <textarea name="qd" rows="2" cols="70" placeholder="Insira a alternativa D)" style="width: 100%;"></textarea>
        <br><br>

        <textarea name="qe" rows="2" cols="70" placeholder="Insira a alternativa E)" style="width: 100%;"></textarea>
        <br><br>

        <button type="submit" style="font-weight: bold;" class="btn btn-dark">Confirmar</button>

        </form>

        <br><hr><br>
        <!-- Aqui comeca a table -->

        <?php 
            $editar = DB::select('SELECT * FROM enunciados');            
        ?>
    <h3 style="text-align: left;">Questões</h3>
      <table class="table">
      <caption>Tabela de questões</caption>
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Enunciado</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <?php foreach ($editar as $editares) {          
          ?>
          <th scope="row" style="vertical-align: middle;"><?php echo $editares->enu_codigo; ?></th>
          <td style="text-align: left;"><?php echo $editares->enu_nome; ?></td>
          <td style="vertical-align: middle;">
          <form action="/tasks/{{ $editares->enu_codigo }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit"><img src="xis.png" style="width: 0.9em;  height: 0.9em;"></button>
          </form>


          </td>
        </tr>
        <?php
        } ?>
      </tbody>
    </table>




































     <?php
            } else {
                ?>
                    <?php 

        for ($a=1; $a < 1000; $a++) { 
                     

            $users = DB::select('SELECT * FROM enunciados WHERE enu_codigo = ? ORDER BY enu_codigo' , [$a]);
            
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
                 <?php
            }
?>



    
    
</x-app-layout>
