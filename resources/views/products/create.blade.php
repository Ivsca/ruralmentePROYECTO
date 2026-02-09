<x-app-layout>
  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <div class="container py-5 font-sans font-medium tracking-wide">
    <div class="card shadow-sm border-0">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="mb-0">Agregar Producto</h3>
          <a href="{{ route('admin.Tabla-productos') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row g-4">
          
            <div class="col-md-5">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <label class="form-label fw-semibold">Imagen del producto</label>

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

                <!-- -------------- MODIFICACION SOLO EN COLORES -------------- -->
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

                  <!-- Aquí se llenan los valores reales para enviar -->
                  <div id="colors-hidden-inputs"></div>
                </div>

                <!-- PANEL flotante para elegir colores -->
                <div id="colors-panel"
                    class="card p-3 shadow-lg"
                    style="position:fixed; bottom:20px; right:20px; width:260px; display:none; z-index:9999;">
                    <h6 class="fw-bold mb-2">Seleccionar color</h6>

                    <div id="colors-list" class="d-flex flex-wrap gap-2">
                        <!-- SE CREAN AUTOMÁTICAMENTE DESDE JS -->
                    </div>

                    <!-- importante: type="button" para no enviar form -->
                    <button type="button" class="btn btn-sm btn-secondary w-100 mt-3" id="close-colors-btn">Cerrar</button>
                </div>
                <!-- -------------- FIN DE LA MODIFICACION -------------- -->

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

    // ------------------ COLORES (JS) ------------------
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
        { name: "Purple", value: "purple" },
        { name: "Pink", value: "pink" },
        { name: "Magenta", value: "magenta" },
        { name: "Turquoise", value: "turquoise" }
    ];

    // elementos
    const showPanelBtn = document.getElementById("show-colors-btn");
    const colorPanel = document.getElementById("colors-panel");
    const closePanelBtn = document.getElementById("close-colors-btn");

    const listColors = document.getElementById("colors-list");
    const selectedColors = document.getElementById("selected-colors");
    const hiddenInputs = document.getElementById("colors-hidden-inputs");

    let chosenColors = []; // array final que se enviará

    // protección: si elementos no existen, salir
    if (showPanelBtn) {
      showPanelBtn.addEventListener("click", (e) => {
        e.preventDefault(); // por si acaso
        colorPanel.style.display = "block";
      });
    }
    if (closePanelBtn) {
      closePanelBtn.addEventListener("click", (e) => {
        e.preventDefault();
        colorPanel.style.display = "none";
      });
    }

    // Renderizar colores dentro del panel
    function loadColors() {
        if (!listColors) return;
        listColors.innerHTML = "";

        COLORS.forEach(color => {
            const btn = document.createElement("button");

            // importante: type="button" para evitar submit
            btn.type = "button";

            btn.className = "btn btn-sm border";
            btn.style.background = color.value;
            btn.style.width = "32px";
            btn.style.height = "32px";
            btn.style.borderRadius = "6px";
            btn.style.boxShadow = "inset 0 0 0 1px rgba(255,255,255,0.05)";

            btn.title = color.name;

            btn.onclick = () => selectColor(color);

            listColors.appendChild(btn);
        });
    }
    loadColors();

    // Agregar color seleccionado
    function selectColor(color) {
        if (chosenColors.includes(color.value)) return;

        chosenColors.push(color.value);
        renderSelectedColors();
    }

    // Mostrar colores seleccionados
    function renderSelectedColors() {
        if (!selectedColors || !hiddenInputs) return;
        selectedColors.innerHTML = "";
        hiddenInputs.innerHTML = "";

        chosenColors.forEach((col) => {

            // chip visual
            const box = document.createElement("div");
            box.className = "d-flex align-items-center px-2 py-1 rounded";
            box.style.background = col;
            box.style.border = "1px solid rgba(0,0,0,0.08)";
            // elegir texto oscuro o claro según contraste básico
            box.style.color = getContrastYIQ(col) === 'dark' ? '#000' : '#fff';
            box.style.fontSize = "14px";
            box.style.gap = "8px";

            const text = document.createElement("span");
            text.textContent = col;
            text.style.paddingRight = "6px";

            const removeBtn = document.createElement("button");

            // importante: type="button"
            removeBtn.type = "button";

            removeBtn.textContent = "×";
            removeBtn.className = "btn btn-sm btn-light p-0 px-2";
            removeBtn.style.fontWeight = "bold";

            removeBtn.onclick = (e) => {
                e.preventDefault();
                chosenColors = chosenColors.filter(c => c !== col);
                renderSelectedColors();
            };

            box.appendChild(text);
            box.appendChild(removeBtn);
            selectedColors.appendChild(box);

            // input oculto que se enviará
            const hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = "colores[]";
            hidden.value = col;
            hiddenInputs.appendChild(hidden);
        });
    }

    // utilidad simple para contraste (retorna 'light' o 'dark')
    function getContrastYIQ(hexcolor){
        // si es palabra de color, usar un canvas para resolver a rgb
        const c = document.createElement("canvas");
        const ctx = c.getContext("2d");
        ctx.fillStyle = hexcolor;
        const rgb = ctx.fillStyle; // browser normaliza
        // rgb puede venir como "rgb(r,g,b)" o color name; parse numbers:
        let m = rgb.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/i);
        if (!m) {
            // fallback: negro
            return 'light';
        }
        const r = parseInt(m[1], 10);
        const g = parseInt(m[2], 10);
        const b = parseInt(m[3], 10);
        const yiq = ((r*299)+(g*587)+(b*114))/1000;
        return (yiq >= 128) ? 'dark' : 'light';
    }

    // inicial render por si hay valores antiguos en old()
    (function hydrateFromOld() {
        // si Laravel retornó old('colores') como array en el backend, puedes inyectarlo en JS:
        try {
            const oldColors = @json(old('colores', []));
            if (Array.isArray(oldColors) && oldColors.length) {
                chosenColors = oldColors.map(c => String(c));
                renderSelectedColors();
            }
        } catch(e) { /* ignore */ }
    })();
    // ------------------ FIN COLORES ------------------
  </script>
</x-app-layout>
