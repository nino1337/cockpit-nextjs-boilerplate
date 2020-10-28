import React from 'react';

import { axe, render } from '../../utils/testUtils';
import Button from './Button';

describe('<Button />', () => {
  let utils;
  describe('children', () => {
    describe('when children are given', () => {
      it('renders the given children', () => {
        utils = render(<Button>Test</Button>);
        const { getByText } = utils;

        expect(getByText('Test')).toBeInTheDocument();
      });
    });
  });

  describe('accessibility', () => {
    it('is accessible according to https://github.com/nickcolley/jest-axe', async () => {
      utils = render(<Button>Test</Button>);
      const { container } = utils;
      const component = await axe(container);

      expect(component).toHaveNoViolations();
    });
  });
});
