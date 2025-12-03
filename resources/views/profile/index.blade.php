<x-guest-layout>
@auth
<header>
    <button>actualizar datos</button>
    <button>cerrar sesion</button>
</header>

<div class="carrito_compras">
    <form class="productos del carrito de compras">
        <div class="card">
            <input type="checkbox">
            <img src="" alt="">
            <div class="datos del productos">
                <p>precio</p>
                <p>cantidad</p>
                <p>subtotal</p>
            </div>
        </div>
    </form>
    <div class="total">
        <p>total</p>
        <button>comprar</button>
    </div>
</div>
@endauth
</x-guest-layout>