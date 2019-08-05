<template>
  <modal name='modal-response' transition="pop-out" :height="'auto'" width="100%" :maxWidth="1170" :maxHeight="680"
         :adaptive="true"
         :scrollable="true" @before-open="beforeOpen" @before-close="activeSrollFp" :pivotY="0.8">
    <div class="modal b-modal-response">
      <div class="close-modal" @click="$modal.hide('modal-response')" title="Закрыть">
        <img src="../../assets/img/icon/delete.svg" svg-inline alt="">
      </div>
      <div class="wrapper-overflow">
        <div class="title-wrapper">
          <h2 class="title">Бриф на разработку</h2>
        </div>
        <form class="form-response" @submit.prevent="onSubmit" :class="{disabled: disabled}">
          <div class="status">
            <div class="status__success" v-if="status === 'success'">
              <span>Спасибо, ваша заявка принята!</span>
            </div>
            <div class="status__error" v-if="status === 'error'">
              <span>Ошибка сервера</span>
            </div>
          </div>
          <div class="wrapper-description">
            <strong class="wrapper-description__description">Подробно заполненный бриф поможет нам разработать для вас
              продукт в более короткие сроки. Спасибо!</strong>
          </div>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">1. Контактная информация</h3>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-1">Компания</label>
              <input class="g-item-form__field g-item-form__field--modals"
                     v-model="form.company" id="contactsInfo-1">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-2">Контактное лицо, должность</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.function_person" id="contactsInfo-2">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-3">Телефон</label>
              <input class="g-item-form__field g-item-form__field--modals" type="tel"
                     v-model="form.phone" id="contactsInfo-3">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-4">Сайт</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.site" id="contactsInfo-4">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-5">E-mail</label>
              <input class="g-item-form__field g-item-form__field--modals" type="email"
                     v-model="form.email" id="contactsInfo-5">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="contactsInfo-6">Другое (например Skype)</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.other_contacts" id="contactsInfo-6">
            </div>
          </fieldset>
          <fieldset class="form-response__group group-item">
            <h3 class="group-item__title">2. Реализуемый проект</h3>
            <div class="g-item-form g-item-form--modals g-item-form--textarea">
              <label class="g-item-form__label" for="project-1">Сфера деятельности компании (например,
                недвижимость)</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-1" v-model="form.questions[0].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-2">Целевая аудитория (возраст, пол, доход, интересы и
                тд)</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-2" v-model="form.questions[1].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-3">Какие регионы интересуют (Москва/Казахстан/Весь
                Мир)</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     id="project-3" v-model="form.questions[2].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-4">Основная информация - что представляет компания, что
                делает и что предлагает - услуги, товары</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-4" v-model="form.questions[3].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-5">Цель сайта - что должен донести/продать/показать</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     id="project-5" v-model="form.questions[4].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-6">Уникальное торговое предложение</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.questions[5].special_offer" id="project-6">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-7">Проблема, которую решает продукт/услуга компании, и как
                компания решает эту проблему</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-7" v-model="form.questions[6].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-8">Какие преимущества у вашего проекта? (Например, ниже
                стоимость, наличие доставки, тех поддержки)</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-8" v-model="form.questions[7].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-9">Список конкурентов (Список сайтов)</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.questions[8].answers" id="project-9">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-10">Список функций/задач, которые выполняет сайт (например,
                размещение вакансий, поиск вакансий, отображение новостей, регистрация пользователей, покупки товаров,,
                вход через )</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-10" v-model="form.questions[9].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-11">Разделы, которые хотелось бы видеть, (например,
                корзина)</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-11" v-model="form.questions[10].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-12">Дополнительные услуги (например, дизайн, SEO
                продвижение, контекстная реклама)</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-12" v-model="form.questions[11].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-13">Потребуется ли функционал администратора для
                редактирования контента, управления пользователями и тд. Если да, то для чего именно</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-13" v-model="form.questions[12].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-14">Ожидаемый бюджет на разработку</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-14" v-model="form.questions[13].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-15">Ожидаемые сроки разработки проекта</label>
              <input class="g-item-form__field g-item-form__field--modals " type="text"
                     id="project-15" v-model="form.questions[14].answers">
            </div>
            <div class="g-item-form g-item-form--modals">
              <label class="g-item-form__label" for="project-16">Другое (например Skype)</label>
              <input class="g-item-form__field g-item-form__field--modals" type="text"
                     v-model="form.questions[15].answers" id="project-16">
            </div>
          </fieldset>
          <div class="btn-wrapper">
            <button class="btn-wrapper__btn" type="submit">Отправить</button>
          </div>
        </form>
      </div>

    </div>
  </modal>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "ModalResponse",
    data() {
      return {
        disabled: false,
        token: '',
        response: '',
        status: '',
        form: {
          nameForm: 'briefing',
          company: '',
          function_person: '',
          phone: '',
          site: '',
          email: '',
          other_contacts: '',
          questions: [
            {
              label: 'Сфера деятельности компании (например, недвижимость)',
              answers: ''
            },
            {
              label: 'Целевая аудитория (возраст, пол, доход, интересы и тд)',
              answers: ''
            },
            {
              label: 'Какие регионы интересуют (Москва/Казахстан/Весь Мир)',
              answers: ''
            },
            {
              label: 'Основная информация - что представляет компания, что делает и что предлагает - услуги, товары',
              answers: ''
            },
            {
              label: 'Цель сайта - что должен донести/продать/показать',
              answers: ''
            },
            {
              label: 'Уникальное торговое предложение',
              answers: ''
            },
            {
              label: 'Проблема, которую решает продукт/услуга компании, и как компания решает эту проблему',
              answers: ''
            },
            {
              label: 'Какие преимущества у вашего проекта? (Например, ниже стоимость, наличие доставки, тех поддержки)',
              answers: ''
            },
            {
              label: 'Список конкурентов (Список сайтов)',
              answers: ''
            },
            {
              label: 'Список функций/задач, которые выполняет сайт (например, размещение вакансий, поиск вакансий, отображение новостей, регистрация пользователей, покупки товаров, вход через )',
              answers: ''
            },
            {
              label: 'Разделы, которые хотелось бы видеть, (например, корзина)',
              answers: ''
            },
            {
              label: 'Дополнительные услуги (например, дизайн, SEO продвижение, контекстная реклама)',
              answers: ''
            },
            {
              label: 'Потребуется ли функционал администратора для редактирования контента, управления пользователями и тд. Если да, то для чего именно',
              answers: ''
            },
            {
              label: 'Ожидаемый бюджет на разработку',
              answers: ''
            },
            {
              label: 'Ожидаемые сроки разработки проекта',
              answers: ''
            },
            {
              label: 'Другое (например Skype)',
              answers: ''
            }
          ],
        }
      }
    },
    methods: {
      activeSrollFp() {
        fullpage_api.setAllowScrolling(true);
      },
      beforeOpen(event) {
        fullpage_api.setAllowScrolling(false);
        this.status = event.params.status
      },
      onSubmit() {
        this.disabled = true
        this.$recaptcha('login').then((token) => {
          this.token = token
          let formData = new FormData();
          formData.append('nameForm', this.form.nameForm);
          formData.append('company', this.form.company);
          formData.append('function_person', this.form.function_person);
          formData.append('phone', this.form.phone);
          formData.append('site', this.form.site);
          formData.append('email', this.form.email);
          formData.append('other_contacts', this.form.other_contacts);
          formData.append('questions', JSON.stringify(this.form.questions));
          formData.append('token', this.token);
          axios.post('/mail.php', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
          }).then(response => {
            this.$modal.hide('modal-response')
          })
        }).catch(error => {
          console.log(error)
          this.disabled = false
        })
      }
    }
  }
</script>

<style scoped>

</style>
