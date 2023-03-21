import './bootstrap';

import {createApp} from 'vue';
import app from './layouts/app.vue';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
/* <font-awesome-icon icon="fa-solid fa-user-secret" /> */
import { faPenToSquare } from '@fortawesome/free-regular-svg-icons';
/* <font-awesome-icon icon="fa-regular fa-pen-to-square" /> */
import { faRectangleXmark } from '@fortawesome/free-regular-svg-icons';
/* <font-awesome-icon icon="fa-regular fa-rectangle-xmark" /> */

/* add icons to the library */
library.add(faUserSecret, faPenToSquare, faRectangleXmark)

createApp(app).component('font-awesome-icon', FontAwesomeIcon).mount('#app');