<template>
    
        <div class="dropdown ">
            
            <div @click ="isOpen = !isOpen" @mouseout="isOpen = !isOpen">
                <slot name="trigger"></slot>    
            </div>

            <div v-show="isOpen" 
                class = "dropdown-menu absolute bg-white rounded shadow my-4 mr-10 w-48"
                :class ="align === 'right'? 'right-0' : ''"
            >
                <slot></slot>
            </div>
        </div>
</template>

<script>    
    export default {
        props:{
            align :{ default: 'left' }
        },

        data(){
            return { isOpen: false}
        }      
    }
</script>