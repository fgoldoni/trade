import { defineAsyncComponent } from "vue";

const modal = {
    computed: {
        modalComponent() {
            return this.$page.props.modal
                ? defineAsyncComponent(
                      () =>
                          import(
                              `../Pages/${this.$page.props.modal.module}/Modal/${this.$page.props.modal.component}.vue`
                          ),
                  )
                : false;
        },
    },
};

export { modal };
