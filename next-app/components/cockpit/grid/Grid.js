import 'bootstrap/dist/css/bootstrap-grid.min.css';

import React from 'react';
import { Col, Row } from 'reactstrap';

import CockpitComponents from '../../cockpitComponents/CockpitComponents';

const Grid = ({ columns = [] }) => {
  const columnLength = columns.length;

  return (
    <Row>
      {columns.length &&
        columns.map((column, index) => (
          <Col xs={12} sm={columnLength > 1 ? 6 : 12} md={12 / columnLength} key={`key-${index}`}>
            <CockpitComponents components={column.children} />
          </Col>
        ))}
    </Row>
  );
};

export default Grid;
