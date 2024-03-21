<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>productos</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('storage/assets/photos/portda-arma-tu-box.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .content {
            position: relative;
            z-index: 1;
            /* Asegura que el contenido esté sobre la imagen de fondo */
        }
    </style>
</head>

<body>

    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <div class="mx-auto w-full max-w-[550px] bg-white"
            style="width: max-content;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: -6px 9px 24px 5px;">
            <form method="POST" action="/productos">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nombre del Producto
                    </label>
                    <input type="text" name="name" id="name" placeholder="Nombre completo"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="productDescription" class="mb-3 block text-base font-medium text-[#07074D]">
                        Descripción del Producto
                    </label>
                    <textarea name="productDescription" id="productDescription" placeholder="Enter product description"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] resize-none outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                </div>

                <div class="mb-5" style="width: 150px">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Precio
                    </label>
                    <input type="number" name="price" id="price"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="stockMin" class="mb-3 block text-base font-medium text-[#07074D]">
                                Stock Min
                            </label>
                            <input type="number" name="stockMin" id="stockMin"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="stockActual" class="mb-3 block text-base font-medium text-[#07074D]">
                                Stock Max
                            </label>
                            <input type="number" name="stockActual" id="stockActual"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>

                <div class="mb-5 pt-3">
                    <label class="mb-5 block text-base font-semibold text-[#07074D] sm:text-xl">
                        Detalles
                    </label>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <select name="proveedorHabitual" id="proveedorHabitual">
                                    <option value="">Selecciona un Proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->nombreProveedor }}">
                                            {{ $proveedor->nombreProveedor }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <select name="categoriaProducto" id="categoriaProducto">
                                    <option value="">Categoria Producto</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">
                                            {{ $categoria->nombreCategoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="hover:shadow-form w-full rounded-md bg-[#01a94f] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Crear producto
                    </button>
                </div>
                <div class="m-4" style="padding: 0px 150px;">
                    <button
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        <a href="avascript:history.back()"> Volver</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
