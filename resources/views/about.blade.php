@extends('layouts.master')

@section('content')
    <style>
        .card {
            width: 14rem;
            margin-bottom: 20px;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            height: auto;
        }

        .card-title {
            font-size: 1.2rem;
            white-space: normal;
            overflow: hidden;
        }

        /* Shopping cart styles */
        #shopping-cart {
            position: fixed;
            top: auto;
            bottom: 0;
            right: 0;
            width: 240px;
            height: 50vh;
            /* Set to 50% of the viewport height */
            background-color: #f8f9fa;
            padding: 12px;
            overflow-y: auto;
            border-left: 1px solid #dee2e6;
            box-sizing: border-box;
            z-index: 1000;
            /* Set a value higher than the z-index of the navbar */
        }



        #cart-heading {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .cart-item {
            margin-bottom: 10px;
        }
    </style>
{{-- <form action="" method="post" enctype="multipart/form-data"></form> --}}
    <div class="container">
        <div class="row">
            @foreach ($medis as $Staff)
    <div class="col-md-3">
        <div class="card">
            <img src="{{ asset('image') }}/{{ $Staff->profileimage }}" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title">{{ $Staff->name }}</h5>
                <p class="card-text">รายละเอียด เพิ่มเติม</p>
                <h5 class="card-title">{{ $Staff->price }}</h5>
                @unless (Session::has('loginId'))
                <a href="login" class="btn btn-primary">ซื้อ</a>
                @endunless

                @if(Session::has('loginId'))
                <form action="{{ route('add.cart', ['id' => $Staff->id, 'iduser' => $data->id]) }}" method="post">
    @csrf
    <input type="submit" value="ซื้อ"class="btn btn-primary"onclick="alert('เพิ่มสินค้าเสร็จสิ้น')">

</form>
@endif
            </div>
        </div>
    </div>
@endforeach


        </div>
    </div>

    <!-- Shopping Cart -->
    {{-- <form action="{{ route('sale.id') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="shopping-cart">
            <h3 id="cart-heading">Shopping Cart</h3>
            <div id="cart-items" >
                <!-- Cart items will be displayed here dynamically -->
            </div>
            <input type="text"  name="idmedis"class="form-control" placeholder="Enter email">
            <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
            <button class="btn  btn-success" type="submit">คิดเงิน</button>
        </div>



    </form> --}}
    <div class="center" style="text-align: ">
        {{ $member->links() }}
    </div>

    {{-- <script>


        // JavaScript code for handling cart functionality
        const cartItemsContainer = document.getElementById('cart-items');

        // Function to add an item to the cart
        function addToCart(productId) {
            // Add your logic to handle adding items to the cart
            // You can use AJAX to send a request to your server and update the cart data
            const productName = `Product ${productId}`;
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.textContent = productName;
            cartItemsContainer.appendChild(cartItem);
        }

        // Event listener for the "buy" buttons
        const addToCartButtons = document.querySelectorAll('.addToCart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.dataset.productId;
                addToCart(productId);
            });
        });

        // Function to clear the cart
        function clearCart() {
            localStorage.removeItem('cart');
            updateCartDisplay();
        }

        // Function to add an item to the cart
        function addToCart(productId) {
            const productName = `ID ${productId}`;

            // Retrieve existing cart data from local storage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Add the new item to the cart
            cart.push(productName);

            // Save the updated cart data to local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Update the cart display
            updateCartDisplay();
        }

        // Function to update the cart display
        function updateCartDisplay() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Clear the existing cart items
            cartItemsContainer.innerHTML = '';

            // Display the updated cart items
            cart.forEach(productName => {
                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.textContent = productName;
                cartItemsContainer.appendChild(cartItem);
            });
        }

        // Update the cart display when the page loads
        window.onload = updateCartDisplay;
    </script> --}}
@endsection
