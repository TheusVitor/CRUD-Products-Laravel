<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Produto</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 0;
        }

        .btn-primary,
        .btn-secondary {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Cadastrar Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome do produto:</label>
                <input type="text" name="name" required value="{{ $errors->any() ? Request::old('name') : null }}"
                    id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Descrição do produto:</label>
                <textarea name="description" required id="description" class="form-control">{{ $errors->any() ? old('description') : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Preço do produto:</label>
                <input type="text" name="price" value="{{ $errors->any() ? old('price') : '' }}" id="price"
                    required class="form-control">
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade em estoque:</label>
                <input type="number" name="quantity" value="{{ $errors->any() ? Request::old('quantity') : null }}"
                    required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Remover símbolo "R$" e vírgulas do valor antes de enviar o formulário
            $('form').submit(function() {
                var priceInput = $('#price');
                var priceValue = priceInput.val().replace(',', '.');
                priceInput.val(priceValue);
            });
        });
    </script>
</body>

</html>
