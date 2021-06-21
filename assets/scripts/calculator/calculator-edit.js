const CalculatorEdit = (props) => {
  const {Fragment} = wp.element;

  return (
    <Fragment>
      <div className='dashifen-limit-calculator in-editor'>
        <span className='dashifen-limit-calculator-title'>SR5 Limit Calculator</span>
        <p className='dashifen-limit-calculator-description'>
          The SR5 limit calculator will be displayed here.
        </p>
      </div>
    </Fragment>
  )
};

export default CalculatorEdit;
