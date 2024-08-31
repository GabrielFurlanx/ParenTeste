<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-500">
      <div class="w-full max-w-96 bg-white rounded shadow-md">
        <div class="bg-orange-500 text-white text-center py-2 rounded-t">
          CADASTRO
        </div>
        <form class="px-8 pt-6 pb-8" @submit.prevent="registerUser">
          <div class="mb-4 text-center">
            <img src="/UniFil-Logo-Fundo.jfif" alt="UniFil" class="mx-auto mb-4 w-32 h-auto" />
          </div>
          <div class="mb-4">
            <input
              v-model="formData.nome_completo"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="nome_completo"
              type="text"
              placeholder="Nome completo"
            />
          </div>
          <div class="mb-4">
            <input
              v-model="formData.email"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="email"
              type="email"
              placeholder="Email"
            />
          </div>
          <div class="mb-4 flex">
            <input
              v-model="formData.cpf"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2"
              id="cpf"
              type="text"
              placeholder="CPF"
            />
            <input
              v-model="formData.telefone"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="telefone"
              type="text"
              placeholder="Telefone"
            />
          </div>
          <div class="mb-4">
            <input
              v-model="formData.endereco"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="endereco"
              type="text"
              placeholder="Endereço"
            />
          </div>
          <div class="mb-4">
            <input
              v-model="formData.bairro"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="bairro"
              type="text"
              placeholder="Bairro"
            />
          </div>
          <div class="mb-4 flex">
            <input
              v-model="formData.cep"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2"
              id="cep"
              type="text"
              placeholder="CEP"
            />
            <input
              v-model="formData.complemento"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="complemento"
              type="text"
              placeholder="Complemento"
            />
          </div>
          <div class="mb-4 flex">
            <select
              v-model="formData.genero"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2"
              id="genero"
            >
              <option value="" disabled>Gênero</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outro">Outro</option>
            </select>
            <input
              v-model="formData.data_nascimento"
              class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="data_nascimento"
              type="date"
            />
          </div>
          <div class="mb-4">
            <select
              v-model="formData.convenio"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="convenio"
            >
              <option value="" disabled>Convênio</option>
              <option value="Convenio A">Convênio A</option>
              <option value="Convenio B">Convênio B</option>
            </select>
          </div>
          <div class="flex items-center justify-center">
            <button
              class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit"
            >
              Cadastrar
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';

  import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'CadastroForm',
  data() {
    return {
      formData: {
        nome_completo: '',
        email: '',
        cpf: '',
        telefone: '',
        endereco: '',
        bairro: '',
        cep: '',
        complemento: '',
        genero: '',
        data_nascimento: '',
        convenio: ''
      }
    };
  },
  methods: {
    async registerUser() {
      try {
        const response = await axios.post('/cadastro', this.formData);
        alert(response.data.message || 'Usuário cadastrado com sucesso!');
        Inertia.visit(response.data.redirectTo); // Redireciona para a página de login
      } catch (error) {
        if (error.response && error.response.status === 422) {
          const errors = error.response.data.errors;
          let errorMessage = 'Erro ao cadastrar usuário:\n';
          for (const [field, messages] of Object.entries(errors)) {
            errorMessage += `${field}: ${messages.join(', ')}\n`;
          }
          alert(errorMessage);
        } else {
          alert('Erro ao cadastrar usuário. Tente novamente mais tarde.');
        }
      }
    }
  }
};

  </script>

  <style scoped>

  </style>
