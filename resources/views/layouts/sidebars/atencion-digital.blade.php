
<div class="menu-item pt-5">
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">Atención Digital</span>
    </div>
</div>

<div class="menu-item ">
    <a @class(['menu-link', 'active' => $routeName === 'sistema.atencion-digital.index'])
        href="{{route('sistema.atencion-digital.index')}}">
        <span class="menu-icon">
            <i class="ki-duotone ki-financial-schedule fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </i>                                   
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>

<div class="menu-item ">
    <a @class(['menu-link', 'active' => $routeName === 'sistema.atencion-digital'])
        href="#">
        <span class="menu-icon">
            <i class="ki-duotone ki-tablet-text-up fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>                               
        </span>
        <span class="menu-title">Reportes</span>
    </a>
</div>

<div class="menu-item pt-5">
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">Administración</span>
    </div>
</div>


<div class="menu-item ">
    <a @class(['menu-link', 'active' => $routeName === 'sistema.atencion-digital.agentes'])
        href="#">
        <span class="menu-icon">
            <i class="ki-duotone ki-security-user fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>             
        </span>
        <span class="menu-title">Agentes</span>
    </a>
</div>

<div class="menu-item ">
    <a @class(['menu-link', 'active' => ($routeName === 'sistema.atencion-digital.departamentos.index' || $routeName === 'sistema.atencion-digital.departamentos.create' || $routeName === 'sistema.atencion-digital.departamentos.edit')])
        href="{{ route('sistema.atencion-digital.departamentos.index') }}">
        <span class="menu-icon">
            <i class="ki-duotone ki-element-equal fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>                              
        </span>
        <span class="menu-title">Departamentos</span>
    </a>
</div>

<div class="menu-item ">
    <a @class(['menu-link', 'active' => $routeName === 'sistema.atencion-digital.ciudadanos.index'])
        href="{{ route('sistema.atencion-digital.ciudadanos.index') }}">
        <span class="menu-icon">
            <i class="ki-duotone ki-people fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>                         
        </span>
        <span class="menu-title">Ciudadanos</span>
    </a>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span @class([
        'menu-link', 
        'active' => (
            str_contains($routeName, 'atencion-digital.canales') 
            || str_contains($routeName, 'atencion-digital.categorias') 
            || str_contains($routeName, 'atencion-digital.subcategorias') 
            || str_contains($routeName, 'atencion-digital.colonias')
            || str_contains($routeName, 'atencion-digital.estatus'))
        ])>
        <span class="menu-icon">
            <i class="ki-duotone ki-notepad fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
                <span class="path5"></span>
            </i>
        </span>
        <span class="menu-title">Catálogos</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion" style="display: none; overflow: hidden;" kt-hidden-height="125">
        <div class="menu-item">
            <a class="menu-link" href="{{ route('sistema.atencion-digital.canales.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Canales</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{ route('sistema.atencion-digital.categorias.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Categorías</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{ route('sistema.atencion-digital.colonias.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Colonias</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{ route('sistema.atencion-digital.estatus.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Estatus</span>
            </a>
        </div>
    </div>
</div>