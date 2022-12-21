<?php require_once("templates/dashboard-sidemenu.php") ?>
            <div class="col py-3">
                <div class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                    <div
                      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                      <h1 class="h2">Dashboard</h1>
                      <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                          <a href="newproduct.html" class="btn btn-sm btn-success">+ Adicionar produto</a>
                        </div>
                      </div>
                    </div>
            
                    <h2>Produtos</h2>
                    <div class="table-responsive">
                      <table class="table table-striped table-sm text-center align-items-center">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preco</th>
                            <th scope="col" class="actions-column">Ações</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><img src="/IMGS/cebola.jpg" width="50px" height="50px" style="object-fit: cover;"></td>
                            <td>data</td>
                            <td>placeholder</td>
                            <td>text</td>
                            <td>placeholder</td>
                            <td class="actions-column d-flex justify-content-center  pb-3">
                                <a href="#" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <form action="" class="ms-2" method="POST">
                                  <input type="hidden" name="type" value="delete">
                                  <input type="hidden" name="id" value="">
                                  <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>