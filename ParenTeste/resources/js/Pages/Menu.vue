<template>
  <div class="d-flex" id="wrapper">
    <div class="border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"></div>
      <div class="list-group list-group-flush">
        <!-- Outros itens do menu -->
        <a href="#testePaternidadeSubmenu" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-toggle="collapse" aria-expanded="false">
          Teste de Paternidade
          <i class="fas fa-chevron-right arrow-icon"></i>
        </a>
        <div class="collapse" id="testePaternidadeSubmenu">
          <a href="/calculo" class="list-group-item list-group-item-action submenu-item">Novo Teste</a>
        </div>
        <a href="#exameSangueSubmenu" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-toggle="collapse" aria-expanded="false">
          Exame de Sangue
          <i class="fas fa-chevron-right arrow-icon"></i>
        </a>
        <div class="collapse" id="exameSangueSubmenu">
          <a href="#" class="list-group-item list-group-item-action submenu-item">Novo Teste</a>
          <a href="#" class="list-group-item list-group-item-action submenu-item">Histórico de Laudos</a>
        </div>
        <!-- Botão de Cadastro -->
        <a href="/cadastro" class="list-group-item list-group-item-action">
          Cadastrar
        </a>
      </div>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">
          <i class="fas fa-bars"></i>
        </button>
        <div class="ml-auto d-flex align-items-center">
          <i class="fas fa-user user-icon"></i>
          <span class="navbar-text">Usuário</span>
        </div>
      </nav>
      <img src="/UniFil-Logo-Fundo.jfif" alt="Logo da UniFil" style="width: 200px; height: 50px; float: right;">
      <div class="container-fluid">
        <h1 class="mt-4">ParenTeste</h1>
        <p>Bem-vindo à página inicial do ParenTeste</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Menu',
  mounted() {
    document.getElementById('menu-toggle').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('wrapper').classList.toggle('toggled');
    });

    document.querySelectorAll('.collapse').forEach(collapse => {
      new bootstrap.Collapse(collapse, { toggle: false });
    });

    document.addEventListener('show.bs.collapse', function (e) {
      e.target.previousElementSibling.querySelector('.arrow-icon').classList.replace('fa-chevron-right', 'fa-chevron-down');
    });
    document.addEventListener('hide.bs.collapse', function (e) {
      e.target.previousElementSibling.querySelector('.arrow-icon').classList.replace('fa-chevron-down', 'fa-chevron-right');
    });
  }
}
</script>

<style scoped>
@import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
@import '../../css/styles_inicio.css';
</style>
