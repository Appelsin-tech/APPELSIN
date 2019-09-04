<template>
  <div class="lang" ref="dropdownMenu" :class="[{'lang--active-main-menu': activeMenu}, {open: showMenu}]">
    <p @click="toggleMenu()" class="lang__selected label">
      <span class="label__text">{{ selectedOption.label }}</span>
      <span class="label__icon"></span>
    </p>

    <div>

        <ul class="lang__dropdown-menu dropdown" v-if="showMenu">
          <li class="dropdown__item" v-for="option in options">
            <span class="dropdown__label" v-if="option.label !== selectedOption.label" @click.prevent="updateOption(option)">
              {{ option.label }}
            </span>
          </li>
        </ul>

    </div>

  </div>
</template>

<script>
  export default {
    name: "LangSelect",
    data() {
      return {
        selectedOption: {
          name: '',
        },
        showMenu: false
      }
    },
    props: {
      activeMenu: {},
      options: {
        type: [Array, Object]
      },
      selected: {}
    },
    mounted() {
      this.selectedOption = this.selected;
    },
    methods: {
      updateOption(option) {
        this.selectedOption = option;
        this.showMenu = false;
        this.$emit('updateOption', this.selectedOption);
      },
      toggleMenu() {
        this.showMenu = !this.showMenu;
      },
      documentClick(e){
        let el = this.$refs.dropdownMenu
        let target = e.target
        if ( el !== target && !el.contains(target)) {
          this.showMenu = false
        }
      }
    },
    created () {
      window.addEventListener('click', this.documentClick)
    },
    destroyed() {
      window.removeEventListener("click", this.documentClick);
    },
  }
</script>

<style scoped lang="less">
  @import "../../assets/less/_variables";
  .lang {
    position: relative;
    font-size: 1.7rem;
    text-transform: uppercase;
    font-weight: 300;
    .xs-block({ padding: 5px 5px;});
    &.open {
      .xs-block({background: rgba(0,0,0,0.7);});
      .dropdown {
        .xs-block({background: rgba(0,0,0,0.7);});
      }
    }
    &.lang--active-main-menu {
      color: #000;
      .xs-block({background: rgba(0,0,0,0);});
      .label__icon {
        border-top-color: #000;
      }
      .dropdown {
        .xs-block({background: rgba(0,0,0,0);});
        &__label:hover {
          border-bottom-color: #000;
        }
      }
    }
    .label {
      display: flex;
      align-items: center;
      cursor: pointer;
      &__text {
        margin-right: 8px;
      }
      &__icon {
        border-top: 8px solid #fff;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        transition: 0.2s;
      }
      &.open {
        .label__text {
          opacity: 0.8;
        }
        .label__icon {
          transform: rotate(180deg);
        }
      }
    }
    &__dropdown-menu {
      position: absolute;
      left: 0;
      bottom: -25px;
      .lg-block({ bottom: -22px;});
      .xs-block({ padding-top: 5px; padding-left: 5px; padding-bottom: 5px; right: 0; bottom: -27px;})
    }
    .dropdown {
      &__label {
        padding: 2px 0;
        cursor: pointer;
        border-bottom: 1px solid transparent;
        transition: 0.2s;
        &:hover {
          border-bottom-color: #fff;
        }
      }
    }
  }
</style>
