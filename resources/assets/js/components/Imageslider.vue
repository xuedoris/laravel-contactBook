<template>
    <div class="image-slider-container">
        <transition-group name="fade">
        <img class="img-responsive center-block" v-for="number in [currentSlideIndex]" :key="number" :src="images[currentSlideIndex % images.length].src" :srcset="images[currentSlideIndex % images.length].srcset" alt="yah" >
        </transition-group>
            <a class="prev" @click="prev()">&#10094;</a>
        <a class="next" @click="next()">&#10095;</a>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                images: [
                    {
                        src: 'images/browser.jpg',
                        srcset: 'images/browser-400.jpg 400w, images/browser-750.jpg 750w, images/browser.jpg 900w'
                    },
                    {
                        src: 'https://placekitten.com/970/290',
                        srcset: 'images/browsergrey-400.jpg 400w, images/browsergrey-750.jpg 750w, images/browsergrey.jpg 900w'
                    },
                    {
                        src: 'images/browser.jpg',
                        srcset: 'images/browserblue-400.jpg 400w, images/browserblue-750.jpg 750w, images/browserblue.jpg 900w'
                    }
                ],
                currentSlideIndex: 0
            }
        },
        created: function(){

        },
        methods: {
            next: function(){
                this.currentSlideIndex++;
            },
            prev: function(){
                this.currentSlideIndex--;
            }
        }
    }
</script>
<style scoped>
    .image-slider-container {
        position: relative;
    }
    /* Fading animation */
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter-active {
        position: absolute;
        top:0;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
    .prev, .next {
        cursor: pointer;
        width: auto;
        padding: 10px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        position: absolute;
        top:50%;
        background-color: #000;
    }
    .prev {
        left: 0;
    }
    .next {
        right:0;
    }
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.5);
        text-decoration: none;
    }
</style>
