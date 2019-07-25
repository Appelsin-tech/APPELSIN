<template>
  <modal name='modal-response' transition="pop-out" :height="'auto'" width="100%" :maxWidth="1170" :maxHeight="680"
         :adaptive="true"
         :scrollable="true" @before-open="beforeOpen" @before-close="activeSrollFp" :pivotY="0.8">
    <div class="modal b-modal-response">
      <div class="close-modal" @click="$modal.hide('modal-response')" title="Закрыть">×</div>
      <div class="wrapper-overflow">
        <div class="status">
          <div class="status__success" v-if="response === 'success'">
            <span>Спасибо, ваша заявка принята!</span>
          </div>
          <div class="status__error" v-if="response === 'error'">
            <span>Ошибка сервера</span>
          </div>
        </div>
        <div class="title-wrapper">
          <h2 class="title">Расскажите подробнее о вашем проекте</h2>
          <strong class="title-description">Подробно заполненный бриф поможет нам разработать для вас продукт в более короткие сроки. Спасибо!</strong>
        </div>
        <form class="form-response">
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">1. Контактная информация</h3>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="email" placeholder="Компания" v-model="form.company">
            </div>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="text" placeholder="Контактное лицо, должность" v-model="form.function_person">
            </div>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="tel" placeholder="Телефон" v-model="form.phone">
            </div>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="text" placeholder="Сайт" v-model="form.site">
            </div>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="email" placeholder="E-mail" v-model="form.email">
            </div>
            <div class="g-item-form g-item-form--modals">
              <input class="g-item-form__field g-item-form__field--modals" type="text" placeholder="Другое (например Skype)" v-model="form.other">
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">2. Реализуемый проект</h3>
          </fieldset>
        </form>
      </div>

    </div>
  </modal>
</template>

<script>
  export default {
    name: "ModalResponse",
    data() {
      return {
        response: '',
        form: {
          company: '',
          function_person: '',
          phone: '',
          site: '',
          email: '',
          other: ''
        }
      }
    },
    methods: {
      activeSrollFp() {
        fullpage_api.setAllowScrolling(true);
      },
      beforeOpen(event) {
        fullpage_api.setAllowScrolling(false);
        this.response = event.params.response
      }
    }
  }
</script>

<style scoped>

</style>
