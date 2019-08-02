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
        <div class="status">
          <div class="status__success" v-if="response === 'success'">
            <span>Спасибо, ваша заявка принята!</span>
          </div>
          <div class="status__error" v-if="response === 'error'">
            <span>Ошибка сервера</span>
          </div>
        </div>
        <!--<form class="form-response">-->

        <!--<div class="wrapper-description">-->
        <!--<strong class="wrapper-description__description">Подробно заполненный бриф поможет нам разработать для вас продукт в более короткие сроки. Спасибо!</strong>-->
        <!--</div>-->
        <!--<fieldset class="form-response__group group-item">-->
        <!--<h3 class="group-item__title">1. Контактная информация</h3>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="email" placeholder="Компания" v-model="form.company">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Контактное лицо, должность" v-model="form.function_person">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="tel" placeholder="Телефон" v-model="form.phone">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Сайт" v-model="form.site">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="email" placeholder="E-mail" v-model="form.email">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Другое (например Skype)" v-model="form.other">-->
        <!--</div>-->
        <!--</fieldset>-->
        <!--<fieldset class="form-response__group group-item">-->
        <!--<h3 class="group-item__title">2. Реализуемый проект</h3>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals g-item-form&#45;&#45;textarea">-->
        <!--<textarea rows="1" class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.a"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.b"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.c"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.d"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.e"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Уникальное торговое предложение" v-model="form.other">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.f"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.g"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Список конкурентов (Список сайтов)" v-model="form.other">-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.h"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.i"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.j"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.k"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.l"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<textarea class="g-item-form__field g-item-form__field&#45;&#45;modals g-item-form__field&#45;&#45;textarea"  :placeholder="placeholder.two.m"></textarea>-->
        <!--</div>-->
        <!--<div class="g-item-form g-item-form&#45;&#45;modals">-->
        <!--<input class="g-item-form__field g-item-form__field&#45;&#45;modals" type="text" placeholder="Другое (например Skype)" v-model="form.other">-->
        <!--</div>-->
        <!--</fieldset>-->
        <!--<div class="btn-wrapper">-->
        <!--<button class="btn-wrapper__btn" type="submit">Отправить</button>-->
        <!--</div>-->
        <!--</form>-->
        <iframe
            src="https://docs.google.com/forms/d/e/1FAIpQLSeOoWLnELHWNXWoMNWhqwN8x6898k4Qckh9kd4q6dye7QVelg/viewform?embedded=true"
            width="640" height="580" frameborder="0" marginheight="0" marginwidth="0">Загрузка…
        </iframe>
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
        placeholder: {
          two: {
            a: 'Сфера деятельности компании (например, недвижимость)',
            b: 'Целевая аудитория (возраст, пол, доход, интересы и тд)',
            c: 'Какие регионы интересуют (Москва/Казахстан/Весь Мир)',
            d: 'Основная информация - что представляет компания, что делает и что предлагает - услуги, товары',
            e: 'Цель сайта - что должен донести/продать/показать',
            f: 'Проблема, которую решает продукт/услуга компании, и как компания решает эту проблему',
            g: 'Какие преимущества у вашего проекта? (Например, ниже стоимость, наличие доставки, тех поддержки)',
            h: 'Список функций/задач, которые выполняет сайт (например, размещение вакансий, поиск вакансий, отображение новостей, регистрация пользователей, покупки товаров,, вход через )',
            i: 'Разделы, которые хотелось бы видеть, (например, корзина)',
            j: 'Дополнительные услуги (например, дизайн, SEO продвижение, контекстная реклама)',
            k: 'Потребуется ли функционал администратора для редактирования контента, управления пользователями и тд. Если да, то для чего именно',
            l: 'Ожидаемый бюджет на разработку',
            m: 'Ожидаемые сроки разработки проекта'
          }
        },
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
