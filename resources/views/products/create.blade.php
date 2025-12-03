<x-app-layout>
  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <div class="container py-5">
    <div class="card shadow-sm border-0">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="mb-0">Agregar Producto</h3>
          <a href="{{ route('admin.Tabla-productos') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-4">
            <!-- LEFT: Imagen grande + controls -->
            <div class="col-md-5">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <label class="form-label fw-semibold">Imagen del producto</label>

                  <!-- Preview -->
                  <div class="mb-3">
                    <img id="photoPreview"
                         src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='800' height='600'><rect width='100%' height='100%' fill='%23f8f9fa'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%238c8c8c' font-size='22'>Vista previa de la imagen</text></svg>"
                         alt="Preview"
                         class="w-100 rounded"
                         style="min-height:320px; object-fit:cover; border:1px solid rgba(0,0,0,0.05);" />
                  </div>

                  <div class="mb-3">
                    <input id="photo" name="photo" type="file" accept="image/*" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Sube una imagen clara. Recomendado: 1200x1200 px.</div>
                  </div>

                  <div class="d-flex gap-2">
                    <button type="button" id="removePhoto" class="btn btn-outline-danger btn-sm">Quitar</button>
                    <small class="text-muted align-self-center">Previsualización instantánea antes de subir.</small>
                  </div>
                </div>
              </div>
            </div>

            <!-- RIGHT: Inputs -->
            <div class="col-md-7">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Nombre</label>
                  <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre del producto">
                  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Título</label>
                  <input name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Título corto">
                  @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Descripción breve</label>
                  <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror" placeholder="Descripción corta">{{ old('description') }}</textarea>
                  @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                  <label class="form-label">Descripción detallada</label>
                  <textarea name="contentProductDescription" rows="4" class="form-control @error('contentProductDescription') is-invalid @enderror" placeholder="Detalles, materiales, cuidados, etc.">{{ old('contentProductDescription') }}</textarea>
                  @error('contentProductDescription') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Precio</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input name="price" value="{{ old('price') }}" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="0.00">
                    @error('price') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Stock</label>
                  <input name="stock" value="{{ old('stock') }}" type="number" min="0" class="form-control @error('stock') is-invalid @enderror" placeholder="Cantidad en inventario">
                  @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Color</label>
                    <select name="color" class="form-select @error('color') is-invalid @enderror">
                        <option value="">Selecciona un color</option>

                        <!-- Colores básicos -->
                        <option value="white" style="background:#ffffff; color:#000;">Blanco</option>
                        <option value="black" style="background:#000000; color:#fff;">Negro</option>
                        <option value="gray" style="background:#808080; color:#fff;">Gris</option>
                        <option value="lightgray" style="background:#d3d3d3;">Gris Claro</option>

                        <!-- Colores primarios -->
                        <option value="red" style="background:#ff0000; color:#fff;">Rojo</option>
                        <option value="darkred" style="background:#8b0000; color:#fff;">Rojo Oscuro</option>

                        <option value="blue" style="background:#0000ff; color:#fff;">Azul</option>
                        <option value="navy" style="background:#000080; color:#fff;">Azul Marino</option>
                        <option value="skyblue" style="background:#87ceeb;">Celeste</option>

                        <option value="yellow" style="background:#ffff00;">Amarillo</option>
                        <option value="gold" style="background:#ffd700;">Dorado</option>

                        <option value="green" style="background:#008000; color:#fff;">Verde</option>
                        <option value="lightgreen" style="background:#90ee90;">Verde Claro</option>
                        <option value="darkgreen" style="background:#006400; color:#fff;">Verde Oscuro</option>

                        <!-- Colores extendidos -->
                        <option value="orange" style="background:#ffa500;">Naranja</option>
                        <option value="darkorange" style="background:#ff8c00;">Naranja Oscuro</option>

                        <option value="brown" style="background:#8b4513; color:#fff;">Café</option>
                        <option value="saddlebrown" style="background:#8b4513; color:#fff;">Café Oscuro</option>
                        <option value="beige" style="background:#f5f5dc;">Beige</option>

                        <option value="purple" style="background:#800080; color:#fff;">Morado</option>
                        <option value="violet" style="background:#ee82ee;">Violeta</option>
                        <option value="lavender" style="background:#e6e6fa;">Lavanda</option>

                        <option value="pink" style="background:#ffc0cb;">Rosado</option>
                        <option value="hotpink" style="background:#ff69b4;">Rosado Fuerte</option>
                        <option value="magenta" style="background:#ff00ff;">Magenta</option>

                        <!-- Tonos tierra -->
                        <option value="khaki" style="background:#f0e68c;">Caqui</option>
                        <option value="tan" style="background:#d2b48c;">Arena</option>
                        <option value="chocolate" style="background:#d2691e; color:#fff;">Chocolate</option>

                        <!-- Tonos especiales -->
                        <option value="turquoise" style="background:#40e0d0;">Turquesa</option>
                        <option value="teal" style="background:#008080; color:#fff;">Verde Azulado</option>
                        <option value="cyan" style="background:#00ffff;">Cian</option>

                        <option value="burgundy" style="background:#800020; color:#fff;">Burdeos</option>
                        <option value="mustard" style="background:#ffdb58;">Mostaza</option>
                        <option value="olive" style="background:#808000; color:#fff;">Oliva</option>

                        <!-- Si quieres agregar MUCHOS más colores, te los genero también -->
                    </select>

                    @error('color')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                  <label class="form-label">Categoría</label>
                  <select name="category" class="form-select @error('category') is-invalid @enderror">
                    <option value="camisas" {{ old('category') == 'camisas' ? 'selected' : '' }}>Camisas</option>
                    <option value="gorras" {{ old('category') == 'gorras' ? 'selected' : '' }}>Gorras</option>
                    <option value="cafe" {{ old('category') == 'cafe' ? 'selected' : '' }}>Café</option>
                  </select>
                  @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Estado</label>
                  <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="activo" {{ old('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                  </select>
                  @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- campos de created_at y updated_at (en creación típicamente no se rellenan, pero los incluimos como opcionales ocultos/lectura si quieres) -->
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

  <script>
    // Previsualización de imagen
    const photoInput = document.getElementById('photo');
    const preview = document.getElementById('photoPreview');
    const removeBtn = document.getElementById('removePhoto');
    const colorText = document.getElementById('colorText');
    const colorPicker = document.getElementById('colorPicker');

    photoInput?.addEventListener('change', function () {
      const file = this.files && this.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = e => preview.src = e.target.result;
      reader.readAsDataURL(file);
    });

    removeBtn?.addEventListener('click', function () {
      photoInput.value = '';
      // volver al placeholder
      preview.src = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='800' height='600'><rect width='100%' height='100%' fill='%23f8f9fa'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%238c8c8c' font-size='22'>Vista previa de la imagen</text></svg>";
    });

    // Sincronizar color texto <-> picker
    if (colorPicker && colorText) {
      colorPicker.addEventListener('input', () => colorText.value = colorPicker.value);
      colorText.addEventListener('input', () => {
        try { colorPicker.value = colorText.value; } catch(e) { /* ignore invalid hex */ }
      });
    }
  </script>
</x-app-layout>
