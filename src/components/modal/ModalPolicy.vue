<template>
  <modal name='modal-policy' transition="pop-out" :height="'auto'" width="100%" :maxWidth="1170" :maxHeight="680"  :adaptive="true"
         :scrollable="true" @before-open="disableSrollFp" @before-close="activeSrollFp" :pivotY="0.8">
    <div class="modal b-modal-policy">
      <div class="close-modal" @click="$modal.hide('modal-policy')" title="Закрыть">
        <img src="../../assets/img/icon/delete.svg" svg-inline alt="">
      </div>
      <h2 class="title">{{$t('privacy-policy.title')}}</h2>
      <div class="wrapper-overflow" id="textPolicy" :class="classSection">
        <h3 class="title-section">1. {{$t('privacy-policy.general-provisions.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.general-provisions.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-provisions.p-2')}}.</p>
        <h3 class="title-section">2. {{$t('privacy-policy.general-concepts.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-2')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-3')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-4')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-5')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-6')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-7')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-8')}}.
        </p>
        <p class="paragraph">{{$t('privacy-policy.general-concepts.p-9')}}.</p>
        <h3 class="title-section">3. {{$t('privacy-policy.information.title')}}</h3>
        <ul class="list">
          <li>{{$t('privacy-policy.information.p-1')}};</li>
          <li>{{$t('privacy-policy.information.p-2')}};</li>
          <li>{{$t('privacy-policy.information.p-3')}};</li>
          <li>{{$t('privacy-policy.information.p-4')}}.</li>
        </ul>
        <p class="paragraph">{{$t('privacy-policy.information.p-5')}}.</p>
        <h3 class="title-section">4. {{$t('privacy-policy.data-collection.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.data-collection.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-collection.p-2')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-collection.p-3')}}.</p>
        <h3 class="title-section">5. {{$t('privacy-policy.legal-grounds.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.legal-grounds.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.legal-grounds.p-2')}}.</p>
        <h3 class="title-section">6. {{$t('privacy-policy.data-procedure.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.data-procedure.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-procedure.p-2')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-procedure.p-3')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-procedure.p-4')}}.</p>
        <h3 class="title-section">7. {{$t('privacy-policy.data-transfer.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.data-transfer.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.data-transfer.p-2')}}.</p>
        <h3 class="title-section">8. {{$t('privacy-policy.final-provisions.title')}}</h3>
        <p class="paragraph">{{$t('privacy-policy.final-provisions.p-1')}}.</p>
        <p class="paragraph">{{$t('privacy-policy.final-provisions.p-2')}}
          <a class="link" href="https://appelsin.tech/#policy" target="_blank">https://appelsin.tech/#policy</a>
        </p>
        <p class="paragraph">
          This site is protected by reCAPTCHA and the Google
          <a class="link" href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and
          <a class="link" href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
        </p>
      </div>
    </div>
  </modal>
</template>

<script>
  export default {
    name: "ModalPolicy",
    props: ['classSection'],
    data() {
      return {
        page: 'home'
      }
    },
    methods:{
      disableSrollFp() {
        if(this.$route.path === '/') {
          fullpage_api.setAllowScrolling(false);
        }
      },
      activeSrollFp () {
        if(this.$route.path === '/') {
          fullpage_api.setAllowScrolling(true);
        }
      }
    },
    computed: {
      hashClass () {
        return window.location.hash
      },
    },
  }
</script>

<style scoped>

</style>
