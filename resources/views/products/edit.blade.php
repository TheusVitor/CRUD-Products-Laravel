<!DOCTYPE html>
<html>

<head>
    <title>Editar Produto</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Editar Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="name">Nome do produto:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required
                    class="form-control" />
            </div>

            <div class="form-group">
                <label for="description">Descrição do produto:</label>
                <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Preço do produto:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}"
                    required class="form-control" />
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade em estoque:</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" required
                    class="form-control" />
            </div>

            <div class="d-flex justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary mr-2">Voltar</a>
                    <button type="submit" class="btn btn-primary mr-2">
                        Atualizar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Adicione o link para o arquivo JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function() {
                var priceInput = $("#price");
                var priceValue = priceInput.val().replace(",", ".");
                priceInput.val(priceValue);
            });
        });
    </script>
</body>

</html>
