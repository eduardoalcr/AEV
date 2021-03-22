<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar nova questão') }}
        </h2>
    </x-slot>

    <div style="padding: 30px;text-align: center;margin-left: 15rem;margin-right: 15rem;">

        <form method="POST" action="{{route('tasks.index')}}">
        @csrf

        
<?php
    
    $materias = DB::select('SELECT * FROM materias');

?>

<select name="materia">
    <option value="10" selected>Escolha uma matéria</option>
    <?php
    foreach ($materias as $materia) {
    ?>

  <option value="<?php echo $materia->mat_codigo ?>"><?php echo $materia->mat_nome ?></option>

<?php } ?>
</select>
        <br><br>
        <textarea name="enun" rows="10" cols="70" placeholder="Insira o enunciado da questão" style="width: 100%;"></textarea>
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

        <button type="submit" style="font-weight: bold;">Confirmar</button>

        </form>

    </div>

    
    
</x-app-layout>
