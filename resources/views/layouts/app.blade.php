<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
@keyframes rise {
  0% {
    transform: translateY(100%);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

</style>




    @livewireStyles
</head>
<body>
    @livewire('header')
    @yield('content')
    @livewire('footer')
    @livewire('cart')

    @livewireScripts
    <script>
    document.addEventListener('livewire:navigated', () => {
        const section = document.getElementById('products-section');
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    });
</script>
</body>


</html>
