<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-500">
      <div class="w-96 bg-white rounded shadow-md">
        <div class="bg-orange-500 text-white text-center py-2 rounded-t">
          LOGIN
        </div>
        <form @submit.prevent="handleLogin" class="px-8 pt-6 pb-8">
          <div class="mb-4 text-center">
            <img src="/UniFil-Logo-Fundo.jfif" alt="UniFil" class="mx-auto mb-4" />
          </div>
          <div class="mb-4">
            <input
              v-model="email"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              type="email"
              placeholder="Email"
            />
          </div>
          <div class="mb-6">
            <input
              v-model="senha"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              type="password"
              placeholder="Senha"
            />
          </div>
          <div class="flex items-center justify-center">
            <button
              class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit"
            >
              Login
            </button>
          </div>
          <div class="mt-4 text-center">
            <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
              Esqueceu a senha?
            </a>
          </div>
          <div class="mt-2 text-center">
            <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
              Cadastrar usuário
            </a>
          </div>
        </form>
      </div>
    </div>
  </template>

  <script>
  import { ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';

  export default {
    name: "LoginForm",
    setup() {
      const email = ref('');
      const senha = ref('');

      const handleLogin = async () => {
        try {
          await Inertia.post('/login', {
            email: email.value,
            senha: senha.value
          });
        } catch (error) {
          // Exibe mensagem de erro se houver
          const errorMessage = error.response?.data?.errors?.email[0] || 'Erro desconhecido';
          alert(errorMessage);
        }
      };

      return {
        email,
        senha,
        handleLogin
      };
    }
  }
  </script>

  <style scoped>
  /* Seus estilos aqui */
  </style>
