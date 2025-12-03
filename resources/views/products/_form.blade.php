<x-app-layout>
  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <div class="container py-5">
    <div class="card shadow-sm border-0">
      <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="mb-0">{{ $title ?? 'Formulario' }}</h3>
          <a href="{{ route('admin.Tabla-productos') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
        </div>

        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if(isset($method) && strtoupper($method) === 'PUT') @method('PUT') @endif

          <div class="row g-4">
            <!-- LEFT: Imagen + preview + controls -->
            <div class="col-md-5">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <label class="form-label fw-semibold">Imagen del producto</label>

                  <div class="mb-3">
                    @php
                      // $photoUrl is passed from controller. If null, use placeholder.
                      $placeholder = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='800' height='600'><rect width='100%' height='100%' fill='%23f8f9fa'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%238c8c8c' font-size='22'>Sin imagen</text></svg>";
                    @endphp

                    <img id="photoPreview"
                         src="{{ old('photo_preview') ? old('photo_preview') : ($photoUrl ?? $placeholder) }}"
                         alt="Vista previa"
                         class="w-100 rounded"
                         style="min-height:320px; object-fit:cover; border:1px solid rgba(0,0,0,0.08);" />
                  </div>

                  <div class="mb-3">
                    <input id="photo" name="photo" type="file" accept="image/*"
                           class="form-control @error('photo') is-invalid @enderror">
                    @error('photo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    <div class="form-text">Sube una imagen clara. Recomendado 1200x1200 px.</div>
                  </div>

                  <!-- Hidden flag para indicar que se quiere eliminar la imagen existente -->
                  <input type="hidden" name="remove_photo" id="remove_photo" value="0">

                  <div class="d-flex gap-2">
                    <button type="button" id="removePhoto" class="btn btn-outline-danger btn-sm">
                      Quitar imagen
                    </button>
                    <small class="text-muted align-self-center">
                      {{ (!empty($photoUrl)) ? 'La imagen actual se mostrará. Puedes reemplazarla o quitarla.' : 'No hay imagen. Sube una nueva si quieres.' }}
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- RIGHT: Inputs -->
            <div class="col-md-7">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Nombre</label>
                  <input name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre del producto">
                  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Título</label>
                  <input name="title" value="{{ old('title', $product->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Título corto">
                  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Descripción breve</label>
                  <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror" placeholder="Descripción corta">{{ old('description', $product->description ?? '') }}</textarea>
                  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Descripción detallada</label>
                  <textarea name="contentProductDescription" rows="4" class="form-control @error('contentProductDescription') is-invalid @enderror" placeholder="Detalles, materiales, cuidados, etc.">{{ old('contentProductDescription', $product->contentProductDescription ?? '') }}</textarea>
                  @error('contentProductDescription') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Precio</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input name="price" value="{{ old('price', $product->price ?? '') }}" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="0.00">
                    @error('price') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Stock</label>
                  <input name="stock" value="{{ old('stock', $product->stock ?? '') }}" type="number" min="0" class="form-control @error('stock') is-invalid @enderror" placeholder="Cantidad en inventario">
                  @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Color</label>
                    <select name="color" class="form-select @error('color') is-invalid @enderror">
                        <option value="">Selecciona un color</option>
                        @php
                          $colors = [
                            'white' => 'Blanco','black' => 'Negro','gray' => 'Gris','lightgray' => 'Gris Claro',
                            'red' => 'Rojo','darkred' => 'Rojo Oscuro','blue'=>'Azul','navy'=>'Azul Marino','skyblue'=>'Celeste',
                            'yellow'=>'Amarillo','gold'=>'Dorado','green'=>'Verde','lightgreen'=>'Verde Claro','darkgreen'=>'Verde Oscuro',
                            'orange'=>'Naranja','brown'=>'Café','beige'=>'Beige','purple'=>'Morado','pink'=>'Rosado','khaki'=>'Caqui',
                            'turquoise'=>'Turquesa','burgundy'=>'Burdeos'
                          ];
                        @endphp
                        @foreach ($colors as $value => $label)
                            <option value="{{ $value }}" {{ old('color', $product->color ?? '') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('color') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Categoría</label>
                  <select name="category" class="form-select @error('category') is-invalid @enderror">
                    <option value="camisas" {{ old('category', $product->category ?? '') == 'camisas' ? 'selected' : '' }}>Camisas</option>
                    <option value="gorras"  {{ old('category', $product->category ?? '') == 'gorras' ? 'selected' : '' }}>Gorras</option>
                    <option value="cafe"    {{ old('category', $product->category ?? '') == 'cafe' ? 'selected' : '' }}>Café</option>
                  </select>
                  @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Estado</label>
                  <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="activo"   {{ old('status', $product->status ?? '') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('status', $product->status ?? '') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                  </select>
                  @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex justify-content-end mt-3">
                  <a href="{{ route('products.index') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Guardar producto</button>
                </div>

              </div> <!-- row g-3 -->
            </div> <!-- col-md-7 -->
          </div> <!-- row g-4 -->
        </form>
      </div>
    </div>
  </div>

  <!-- JS: preview, quitar y sincronización de la bandera remove_photo -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const photoInput = document.getElementById('photo');
      const preview = document.getElementById('photoPreview');
      const removeBtn = document.getElementById('removePhoto');
      const removeFlag = document.getElementById('remove_photo');

      const placeholder = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='800' height='600'><rect width='100%' height='100%' fill='%23f8f9fa'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%238c8c8c' font-size='22'>Sin imagen</text></svg>";

      photoInput?.addEventListener('change', function () {
        const file = this.files?.[0];
        if (!file) {
          return;
        }
        const reader = new FileReader();
        reader.onload = e => {
          preview.src = e.target.result;
          if (removeFlag) removeFlag.value = '0';
        };
        reader.readAsDataURL(file);
      });

      removeBtn?.addEventListener('click', function () {
        if (photoInput) photoInput.value = '';
        if (removeFlag) removeFlag.value = '1';
        if (preview) preview.src = placeholder;
      });
    });
  </script>
</x-app-layout>
