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
                  <label class="form-label fw-semibold">Colores</label>

                  <button type="button" id="show-colors-btn" class="btn btn-outline-primary btn-sm">
                      + Escoger colores
                  </button>

                  @error('colores')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror

                  <!-- Contenedor donde se muestran los colores elegidos -->
                  <div id="selected-colors" class="d-flex flex-wrap gap-2 mt-3"></div>

                  <!-- Aquí se llenan los valores reales -->
                  <div id="colors-hidden-inputs"></div>
              </div>

              <!-- PANEL flotante -->
              <div id="colors-panel"
                  class="card p-3 shadow-lg"
                  style="position:fixed; bottom:20px; right:20px; width:260px; display:none; z-index:9999;">
                  <h6 class="fw-bold mb-2">Seleccionar color</h6>

                  <div id="colors-list" class="d-flex flex-wrap gap-2">
                      <!-- JS rellena esto automáticamente -->
                  </div>

                  <button type="button" class="btn btn-sm btn-secondary w-100 mt-3" id="close-colors-btn">Cerrar</button>
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
                  <a href="{{ route('admin.Tabla-productos') }}" class="btn btn-outline-secondary me-2">Cancelar</a>
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

    const COLORS = [
        { name: "White", value: "white" },
        { name: "Black", value: "black" },
        { name: "Gray", value: "gray" },
        { name: "Light Gray", value: "lightgray" },
        { name: "Red", value: "red" },
        { name: "Dark Red", value: "darkred" },
        { name: "Blue", value: "blue" },
        { name: "Navy", value: "navy" },
        { name: "Sky Blue", value: "skyblue" },
        { name: "Yellow", value: "yellow" },
        { name: "Gold", value: "gold" },
        { name: "Green", value: "green" },
        { name: "Light Green", value: "lightgreen" },
        { name: "Dark Green", value: "darkgreen" },
        { name: "Orange", value: "orange" },
        { name: "Brown", value: "brown" },
        { name: "Beige", value: "beige" },
        { name: "Purple", value: "purple" },
        { name: "Pink", value: "pink" },
        { name: "Khaki", value: "khaki" },
        { name: "Turquoise", value: "turquoise" },
        { name: "Burgundy", value: "burgundy" }
    ];

    const showPanelBtn = document.getElementById("show-colors-btn");
    const colorPanel = document.getElementById("colors-panel");
    const closePanelBtn = document.getElementById("close-colors-btn");
    const listColors = document.getElementById("colors-list");
    const selectedColors = document.getElementById("selected-colors");
    const hiddenInputs = document.getElementById("colors-hidden-inputs");

    let chosenColors = [];

    showPanelBtn?.addEventListener("click", () => colorPanel.style.display = "block");
    closePanelBtn?.addEventListener("click", () => colorPanel.style.display = "none");

    function loadColors() {
        listColors.innerHTML = "";
        COLORS.forEach(color => {
            const btn = document.createElement("button");
            btn.type = "button";
            btn.className = "btn btn-sm border";
            btn.style.background = color.value;
            btn.style.width = "32px";
            btn.style.height = "32px";
            btn.style.borderRadius = "6px";
            btn.style.boxShadow = "inset 0 0 0 1px rgba(255,255,255,0.2)";
            btn.title = color.name;
            btn.onclick = () => selectColor(color);
            listColors.appendChild(btn);
        });
    }
    loadColors();

    function selectColor(color) {
        if (!chosenColors.includes(color.value)) {
            chosenColors.push(color.value);
            renderSelectedColors();
        }
    }

    function renderSelectedColors() {
        selectedColors.innerHTML = "";
        hiddenInputs.innerHTML = "";

        chosenColors.forEach(col => {
            const wrapper = document.createElement("div");
            wrapper.className = "d-flex align-items-center px-2 py-1 rounded";
            wrapper.style.background = col;
            wrapper.style.border = "1px solid rgba(0,0,0,0.08)";
            wrapper.style.color = getContrast(col);

            const text = document.createElement("span");
            text.textContent = col;

            const removeBtn = document.createElement("button");
            removeBtn.type = "button";
            removeBtn.className = "btn btn-sm btn-light p-0 px-2 ms-2";
            removeBtn.textContent = "×";
            removeBtn.onclick = () => {
                chosenColors = chosenColors.filter(c => c !== col);
                renderSelectedColors();
            };

            wrapper.appendChild(text);
            wrapper.appendChild(removeBtn);
            selectedColors.appendChild(wrapper);

            const hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = "colores[]";
            hidden.value = col;
            hiddenInputs.appendChild(hidden);
        });
    }

    // Contraste automático
    function getContrast(color) {
        const ctx = document.createElement("canvas").getContext("2d");
        ctx.fillStyle = color;
        const rgb = ctx.fillStyle.match(/\d+/g).map(Number);
        const yiq = (rgb[0]*299 + rgb[1]*587 + rgb[2]*114) / 1000;
        return yiq >= 128 ? "#000" : "#fff";
    }

    // Cargar colores del producto al editar
    (function preload() {
        const saved = @json(old('colores', $product->colores ?? []));

        if (Array.isArray(saved)) {
            chosenColors = saved.map(c => String(c));
            renderSelectedColors();
        }
    })();
  </script>
</x-app-layout>
