import './bootstrap';
import { createIcons, icons } from 'lucide';
import { getCsrfToken, fillFormBySelectors } from './utils/helper';
import './components/modal';
import './pages/product';
import './modules/validation/form-validator';
import './components/search-filter';

window.fillFormBySelectors = fillFormBySelectors

createIcons({ icons });