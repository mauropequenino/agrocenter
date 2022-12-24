<?php
    require_once("templates/header.php")

?>
        <section id="cover" class="container">
            <div class="row g-2 justify-content-around">
                <div class="col-md-7 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3">
                        <img src="img/site/header.jpg" alt="header" class="mx-auto d-block w-100 img-fluid">
                    </div>
                </div>
                
                <div class="col-md-5 d-flex justify-content-center align-items-center order-lg-2">
                    <div class="p-3 hero-text">
                        <h1 class="custom-highlight">AGRO CENTER</h1>
                        <h4>Encontre o Seu Próximo Fornecedor</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="search" class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="search-input">
                        <div class="text-center">
                            <div class="">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control p-3" placeholder="Procure por nome do produto, cidade, fornecedor, etc ...">
                                    <button class="btn btn-success border-rad custom-btn" type="submit" id="button-addon2">Pesquisar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!--- header section fim -->

    <!-- main inicio -->
    <main class="container">

        <!-- Products inicio -->
        <section id="products" class="mt-5">
            <h3 class="product-category-title">Vegetais</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100 shadow custom-card">
                        <img src="img/products/tomate.jpg" class="card-img-top w-100 custom-bg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Tomate</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, rem.</p>
                            <a href="#" class="custom-user">
                                <i class="fas fa-user"></i>
                                <span>Big Farm Maputo</span>
                            </a>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <h4 class="custom-highlight">500.00/kg</h4>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> Ver</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow custom-card">
                        <img src="img/products/tomate.jpg" class="card-img-top w-100 custom-bg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Tomate</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, rem.</p>
                            <a href="#" class="custom-user">
                                <i class="fas fa-user"></i>
                                <span>Big Farm Maputo</span>
                            </a>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <h4 class="custom-highlight">500.00/kg</h4>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> Ver</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow custom-card">
                        <img src="img/products/couve-flor.jpg" class="card-img-top w-100 custom-bg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Tomate</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, rem.</p>
                            <a href="#" class="custom-user">
                                <i class="fas fa-user"></i>
                                <span>Big Farm Maputo</span>
                            </a>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <h4 class="custom-highlight">500.00/kg</h4>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> Ver</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow custom-card">
                        <img src="img/products/tomate.jpg" class="card-img-top w-100 custom-bg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Tomate</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, rem.</p>
                            <a href="#" class="custom-user">
                                <i class="fas fa-user"></i>
                                <span>Big Farm Maputo</span>
                            </a>
                        </div>
                        <div class="card-footer custom-footer">
                            <div class="float-start">
                                <h4 class="custom-highlight">500.00/kg</h4>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-primary rounded-3 custom-btn"><i class="fas fa-shopping-cart"></i> Ver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Products fim -->
    </main>
    <!-- main fim -->
    <?php require_once("templates/footer.php"); ?>
