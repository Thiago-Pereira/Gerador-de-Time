<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    @component('base.componentes.meta')
    @endcomponent

    @component('base.componentes.header')
    @endcomponent

</head>

<body>

    @yield('content')

    @component('base.componentes.scripts')
    @endcomponent

</body>

</html>