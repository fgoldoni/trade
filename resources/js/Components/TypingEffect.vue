<template>
    <span
        :class="`bg-gradient-to-r from-slate-500 to-slate-400 bg-clip-text font-medium text-transparent`"
    >
        {{ text }}
    </span>
</template>

<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    items: Array,
});

const text = ref('');
const textArray = ref(props.items);
const textIndex = ref(0);
const charIndex = ref(0);
const pauseEnd = ref(100);
const pauseStart = ref(20);
const typeSpeed = ref(75);
const direction = ref('forward');

const startTyping = () => {
    let current = textArray.value[textIndex.value];

    if (charIndex.value > current.length) {
        direction.value = 'backward';
        clearInterval(typingInterval);
        setTimeout(function () {
            typingInterval = setInterval(startTyping, typeSpeed.value);
        }, pauseEnd.value);
    }

    text.value = current.substring(0, charIndex.value);

    if (direction.value == 'forward') {
        charIndex.value += 1;
    } else {
        if (charIndex.value == 1) {
            direction.value = 'forward';
            clearInterval(typingInterval);
            setTimeout(function () {
                textIndex.value += 1;
                if (textIndex.value >= textArray.value.length) {
                    textIndex.value = 0;
                }

                typingInterval = setInterval(startTyping, typeSpeed.value);
            }, pauseStart.value);
        }
        charIndex.value -= 1;
    }
};
let typingInterval = setInterval(startTyping, typeSpeed.value);

onMounted(() => {
    startTyping();
});
</script>

<style scoped></style>
