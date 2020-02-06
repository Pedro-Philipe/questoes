<template>
  <div>
    <v-card>
      <v-card-text>
        <v-row justify="center">
          <v-expansion-panels
            inset
            focusable
          >
            <v-expansion-panel
              v-for="(item,i) in programas"
              :key="i"
            >
              <v-expansion-panel-header
                class="font-weight-bold"
              >
                {{ item.banca.no_banca }} - {{ item.orgao.no_orgao }} ({{item.orgao.sg_orgao}})
              </v-expansion-panel-header>
              <v-expansion-panel-content>
                <template>
                  <v-treeview
                    :items="item.assuntos"
                    item-key="id_assunto"
                    item-text="no_assunto"
                    item-children="filhos"
                    open-on-click
                    activatable
                    rounded
                    selected-color="success"
                  >
                    <template v-slot:label="{item}">
                      <span class="font-weight-bold">{{ item.no_assunto }}</span>
                      <v-chip
                        class="ma-2"
                        label
                      >
                        {{ item.quantidade_questoes }} questões
                      </v-chip>
                    </template>
                  </v-treeview>
                </template>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
        </v-row>
      </v-card-text>
      <v-card-actions
        class="justify-center"
      >
        <v-btn
          color="primary"
          class="white--text mr-2"
          @click="abrirDialogPrograma()"
        >
          <v-icon
            dark
            left
          >
            add
          </v-icon>
          Novo Programa
        </v-btn>
      </v-card-actions>
    </v-card>
    <v-dialog
      v-model="dialogPrograma"
      transition="dialog-bottom-transition"
      max-width="600px"
    >
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
          <v-btn
            icon
            dark
            @click="fecharDialogPrograma"
          >
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title class="font-weight-normal">
            novo programa
          </v-toolbar-title>
        </v-toolbar>
        <v-card-text>
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
            autocomplete="off"
          >
            <v-row
              row
              wrap
            >
              <v-col
                md="12"
              >
                <v-select
                  v-model="programa.banca"
                  :items="bancas"
                  label="Banca*"
                  item-text="no_banca"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
            <v-row>
              <v-col
                md="12"
              >
                <v-select
                  v-model="programa.orgao"
                  :items="orgaos"
                  label="Orgão*"
                  item-text="no_orgao"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
          </v-form>
          <small>*indica campos obrigatórios</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer/>
          <v-btn color="red darken-1" text @click="fecharDialogPrograma">fechar</v-btn>
          <v-btn
            color="green darken-1"
            class="white--text mr-2"
            @click="cadastrarPrograma()"
          >
            <v-icon
              dark
              right
            >
              send
            </v-icon>
            Salvar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex';

  export default {
    name: 'Lista',
    components: {},
    data() {
      return {
        dialogPrograma: false,
        valid: false,
        programa: {},
        rules: {
          required: value => !!value || 'Este campo é obrigatório',
        },
      };
    },
    computed: {
      ...mapGetters({
        programas: 'programa/programas',
        bancas: 'programa/bancas',
        orgaos: 'programa/orgaos',
      }),
    },
    mounted() {
      this.buscarBancasAction();
      this.buscarOrgaosAction();
    },
    methods: {
      ...mapActions({
        mensagemSucessoAction: 'app/setMensagemSucesso',
        buscarBancasAction: 'programa/buscarBancasAction',
        buscarOrgaosAction: 'programa/buscarOrgaosAction',
        cadastrarProgramaAction: 'programa/cadastrarProgramaAction',
      }),
      abrirDialogPrograma() {
        this.dialogPrograma = true;
      },
      fecharDialogPrograma() {
        this.dialogPrograma = false;
      },
      cadastrarPrograma() {
        if (!this.$refs.form.validate()) {
          return;
        }
        this.mensagemSucessoAction('Programa cadastrado com sucesso');
        this.cadastrarProgramaAction(this.programa);
        this.fecharDialogPrograma()
        this.programa = {};
        this.$refs.form.reset();
      },
    },
  };
</script>
