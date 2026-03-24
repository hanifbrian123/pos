import './bootstrap';
import { createIcons, icons } from 'lucide';
import { getCsrfToken, fillFormBySelectors } from './utils/helper';
import './components/modal';
import './pages/inventory';
import './modules/validation/form-validator';

window.fillFormBySelectors = fillFormBySelectors

createIcons({ icons });