@php
    $data = new App\Http\Controllers\DataController();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    @component('components.head')
        @slot('defer')
            ''
        @endslot
    @endcomponent
    <link rel="stylesheet" href="/assets/css/profile.css">
    <title>Perfil</title>
</head>

<body>
    <header>
        @component('components.header')
        @endcomponent
    </header>

    <main>
        @component('components.sidebar')
        @endcomponent

        <div id="divprofile">
            <h1>Seguidos: {{ $data->getQtdSeguidores() }}</h1>
            <h1>Seguidores: {{ $data->getQtsSeguindo() }}</h1>

            @php
                $sugestaoSeguir = $data->getSugestaoSeguir(3);
            @endphp

            @if ($sugestaoSeguir->isEmpty())
                <p>Nenhuma sugestão de usuário para seguir.</p>
            @else
                @foreach ($sugestaoSeguir as $sugestao)
                    <h1>{{ $sugestao->nomeusu }}</h1>
                @endforeach
            @endif
        </div>
    </main>

</body>

</html>
