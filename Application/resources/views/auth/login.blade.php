<!DOCTYPE html>
<html lang="pt-br">

<head>
    @component('components.head')
	@slot('defer')
		'defer'
	@endslot
	@endcomponent
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body class="d-grid">
    <main class="d-grid align-self-center">
        <div class="mb-5 p-5 d-flex align-self-center justify-content-center">
            {{-- /* From Uiverse.io by micaelgomestavares */ --}}
            <form id="login" class="backgroundForm">
                @csrf
                <div>
                    <img src="/assets/img/titulo02.png" alt="titulo" style="width: 100%">
                </div>
                <div class="flex-column">
                    <label class="text-info">Email </label>
                </div>
                <div class="inputForm">
                    <svg height="20" fill="#0dcaf0" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                        <g id="Layer_3" data-name="Layer 3">
                            <path
                                d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                            </path>
                        </g>
                    </svg>
                    <input type="email" class="inputForm02" name="email" id="email" maxlength="50"
                        placeholder="Insira seu email">
                </div>

                <div class="flex-column">
                    <label class="text-info">Senha </label>
                </div>
                <div class="inputForm">
                    <svg height="20" fill="#0dcaf0" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                        </path>
                        <path
                            d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                        </path>
                    </svg>
                    <input type="password" class="inputForm02" name="password" id="password" minlength="6"
                        placeholder="EInsira sua senha">
                </div>

                <div class="flex-row">
                    <a class="span" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
                </div>
                @if (session()->has('status'))
                    <span class="text text-success">{{ session()->get('status') }}</span>
                @endif
                <button id="buttonLogin" type="submit" class="button-submit">Entrar</button>
                <p class="p text-light">Ainda não tem uma conta?
                    <br>
                    <a class="span" href="{{ route('cadastro') }}">Cadastre-se aqui</a>
                </p>
        </form>
        </div>
    </main>

    <script src="/assets/js/script.js"></script>
</body>

</html>

<script>
    $('#login').on('submit', function(event) {
        event.preventDefault();

        // Abre o SweetAlert de carregamento
        Swal.fire({
            title: 'Carregando...',
            html: 'Por favor, aguarde.',
            allowOutsideClick: false,
            background: '#203cc1',
            color: "#f8f7ff",
            didOpen: () => {
                Swal.showLoading();
            },
        });

        // Serializa o formulário em um objeto
        const formDataObject = {};
        $(this).serializeArray().forEach(function(field) {
            formDataObject[field.name] = field.value;
        });

        const link = "{{ route('login.action') }}";

        // Converte o objeto em JSON
        const jsonData = JSON.stringify(formDataObject);

        $.ajax({
            url: link,
            type: 'POST',
            contentType: 'application/json',
            data: jsonData,
            dataType: 'json',
            success: function(response) {
                // Fecha o SweetAlert de carregamento
                Swal.close();

                // Verifica se a resposta é verdadeira
                if (response.message == 'Senha ou Email incorretos') {
                    // Exibe um SweetAlert de erro se a resposta não for verdadeira
                    Swal.fire({
                        icon: 'error',
                        title: 'Login maldoso ou inválido!',
                        text: 'Senha ou Email incorretos',
                        background: '#203cc1',
                        color: "#f8f7ff",
                        confirmButtonColor: '#fa0081'
                    }); 
                } else if (response.redirect) {
                    // Abre notificação de sucesso
                    Swal.fire({
                        icon: "success",
                        title: "Concluído",
                        text: "Login bem sucedido!",
                        background: '#203cc1',
                        color: "#f8f7ff",
                        confirmButtonColor: '#fa0081'
                    }).then(() => {
                        // Redireciona para a nova página
                        window.location.href = response.redirect;
                    });
                } else {
                    // Exibe um SweetAlert de erro se a resposta não for verdadeira
                    Swal.fire({
                        icon: 'error',
                        title: 'Login maldoso ou inválido!',
                        text: 'Algo deu errado com seu login. Por favor, tente novamente.',
                        background: '#203cc1',
                        color: "#f8f7ff",
                        confirmButtonColor: '#fa0081'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Fecha o SweetAlert de carregamento
                Swal.close();
                // Abre notificação de erro
                Swal.fire({
                    icon: "error",
                    title: "Algo deu errado!",
                    text: "Tente novamente mais tarde.",
                    background: '#203cc1', 
                    color: "#f8f7ff",
                    confirmButtonColor: '#fa0081'
                });
                console.error('Erro:', textStatus, errorThrown);
                console.error('Resposta do servidor:', jqXHR.responseText);
            }
        });
    });
</script>
