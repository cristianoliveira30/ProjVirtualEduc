<div id="sidebar">
    <div class="col d-flex flex-column align-items-start">
        <div class="row p-1 d-flex justify-content-center">
            {{-- Verifica se a coluna `foto` está definida --}}
            @php
                $fotoPath = Auth::user()->informacoes->foto ?? '/assets/img/svgs/person-circle.svg';
            @endphp

            {{-- Exibe a imagem de perfil --}}
            <img src="{{ asset($fotoPath) }}" style="width:10vh" class="m-auto" alt="imagem de perfil" title="imagem de perfil">

            {{-- Nome do usuário --}}
            <h6 class="text-light d-flex justify-content-center">
                {{ Auth::user()->nomeusu }}
            </h6>
        </div>
        <div class="row" style="width: 120%; border: solid 2px #fa0081"></div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/file-earmark-plus.svg" alt="Adicionar Arquivo" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Novo Arquivo</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/folder-plus.svg" alt="Adicionar Período" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Novo Período</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/collection-play.svg" alt="Ver Conteúdo" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Ver Conteúdo</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/send.svg" alt="configurações" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Mensagens</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/people-fill.svg" alt="configurações" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Amigos</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/journal-bookmark.svg" alt="configurações" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Nossos Termos</h6>
        </div>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/gear.svg" alt="configurações" class="sidebarimg m-3 me-1">
            <h6 class="text-light m-0">Configurações</h6>
        </div>
        <a href="{{route("logout")}}" class="siderow row flex-row align-items-center justify-content-start flex-nowrap">
            <img src="/assets/img/svgs/box-arrow-right.svg" alt="configurações" class="sidebarimg m-3 me-1">
            <h6 class="text-danger m-0">Sair</h6>
        </a>
        <div class="siderow row flex-row align-items-center justify-content-start flex-nowrap"></div>
    </div>
</div>
