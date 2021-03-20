<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('O que vamos fazer hoje?') }}
        </h2>

    </x-slot>

    <style>
        #laink {
            font-size: 2.5rem; 
            padding: 15px;
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
        <a href="{{route ('portugues.index')}}" id="laink">Português</a>
        <a href="{{route ('historia.index')}}" id="laink">História</a>
        <a href="{{route ('sociologia.index')}}" id="laink">Sociologia</a>
        <a href="{{route ('filosofia.index')}}" id="laink">Filosofia</a>
        <a href="{{route ('artes.index')}}" id="laink">Artes</a>
</div>
      
</x-app-layout>
