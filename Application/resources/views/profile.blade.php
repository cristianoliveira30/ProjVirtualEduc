<!DOCTYPE html>
<html lang="en">

<head>
    @component('components.head')
        @slot('defer')
            'defer'
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

        </div>
    </main>

</body>

</html>

<script>

</script>
