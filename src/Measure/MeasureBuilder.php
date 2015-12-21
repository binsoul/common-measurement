<?php

namespace BinSoul\Common\Measurement\Measure;

use BinSoul\Common\Measurement\Measure;
use BinSoul\Common\Measurement\Quantity\Acceleration;
use BinSoul\Common\Measurement\Quantity\AmountOfSubstance;
use BinSoul\Common\Measurement\Quantity\Angle;
use BinSoul\Common\Measurement\Quantity\Area;
use BinSoul\Common\Measurement\Quantity\CatalyticActivity;
use BinSoul\Common\Measurement\Quantity\Constant;
use BinSoul\Common\Measurement\Quantity\DataAmount;
use BinSoul\Common\Measurement\Quantity\DataRate;
use BinSoul\Common\Measurement\Quantity\Dimensionless;
use BinSoul\Common\Measurement\Quantity\Duration;
use BinSoul\Common\Measurement\Quantity\DynamicViscosity;
use BinSoul\Common\Measurement\Quantity\ElectricCapacitance;
use BinSoul\Common\Measurement\Quantity\ElectricCharge;
use BinSoul\Common\Measurement\Quantity\ElectricConductance;
use BinSoul\Common\Measurement\Quantity\ElectricCurrent;
use BinSoul\Common\Measurement\Quantity\ElectricInductance;
use BinSoul\Common\Measurement\Quantity\ElectricPotential;
use BinSoul\Common\Measurement\Quantity\ElectricResistance;
use BinSoul\Common\Measurement\Quantity\Energy;
use BinSoul\Common\Measurement\Quantity\Force;
use BinSoul\Common\Measurement\Quantity\Frequency;
use BinSoul\Common\Measurement\Quantity\Illuminance;
use BinSoul\Common\Measurement\Quantity\KinematicViscosity;
use BinSoul\Common\Measurement\Quantity\Length;
use BinSoul\Common\Measurement\Quantity\Level;
use BinSoul\Common\Measurement\Quantity\LuminousFlux;
use BinSoul\Common\Measurement\Quantity\LuminousIntensity;
use BinSoul\Common\Measurement\Quantity\MagneticFlux;
use BinSoul\Common\Measurement\Quantity\MagneticFluxDensity;
use BinSoul\Common\Measurement\Quantity\Mass;
use BinSoul\Common\Measurement\Quantity\Power;
use BinSoul\Common\Measurement\Quantity\Pressure;
use BinSoul\Common\Measurement\Quantity\RadiationDoseAbsorbed;
use BinSoul\Common\Measurement\Quantity\RadiationDoseEffective;
use BinSoul\Common\Measurement\Quantity\RadioactiveActivity;
use BinSoul\Common\Measurement\Quantity\Ratio;
use BinSoul\Common\Measurement\Quantity\SolidAngle;
use BinSoul\Common\Measurement\Quantity\Temperature;
use BinSoul\Common\Measurement\Quantity\Velocity;
use BinSoul\Common\Measurement\Quantity\Volume;
use BinSoul\Common\Measurement\Unit;

/**
 * Builds measures implementing a concrete quantity interface.
 */
abstract class MeasureBuilder
{
    /**
     * Build a measure with the given value and the given unit.
     *
     * @param float $value
     * @param Unit  $unit
     *
     * @return Measure
     */
    public static function build($value, Unit $unit)
    {
        switch ($unit->getQuantity()) {
            case Acceleration::class:
                return new AccelerationMeasure($value, $unit);
            case AmountOfSubstance::class:
                return new AmountOfSubstanceMeasure($value, $unit);
            case Angle::class:
                return new AngleMeasure($value, $unit);
            case Area::class:
                return new AreaMeasure($value, $unit);
            case CatalyticActivity::class:
                return new CatalyticActivityMeasure($value, $unit);
            case Constant::class:
                return new ConstantMeasure($value, $unit);
            case DataAmount::class:
                return new DataAmountMeasure($value, $unit);
            case DataRate::class:
                return new DataRateMeasure($value, $unit);
            case Dimensionless::class:
                return new DimensionlessMeasure($value, $unit);
            case Duration::class:
                return new DurationMeasure($value, $unit);
            case DynamicViscosity::class:
                return new DynamicViscosityMeasure($value, $unit);
            case ElectricCapacitance::class:
                return new ElectricCapacitanceMeasure($value, $unit);
            case ElectricCharge::class:
                return new ElectricChargeMeasure($value, $unit);
            case ElectricConductance::class:
                return new ElectricConductanceMeasure($value, $unit);
            case ElectricCurrent::class:
                return new ElectricCurrentMeasure($value, $unit);
            case ElectricInductance::class:
                return new ElectricInductanceMeasure($value, $unit);
            case ElectricPotential::class:
                return new ElectricPotentialMeasure($value, $unit);
            case ElectricResistance::class:
                return new ElectricResistanceMeasure($value, $unit);
            case Energy::class:
                return new EnergyMeasure($value, $unit);
            case Force::class:
                return new ForceMeasure($value, $unit);
            case Frequency::class:
                return new FrequencyMeasure($value, $unit);
            case Illuminance::class:
                return new IlluminanceMeasure($value, $unit);
            case KinematicViscosity::class:
                return new KinematicViscosityMeasure($value, $unit);
            case Length::class:
                return new LengthMeasure($value, $unit);
            case Level::class:
                return new LevelMeasure($value, $unit);
            case LuminousFlux::class:
                return new LuminousFluxMeasure($value, $unit);
            case LuminousIntensity::class:
                return new LuminousIntensityMeasure($value, $unit);
            case MagneticFlux::class:
                return new MagneticFluxMeasure($value, $unit);
            case MagneticFluxDensity::class:
                return new MagneticFluxDensityMeasure($value, $unit);
            case Mass::class:
                return new MassMeasure($value, $unit);
            case Power::class:
                return new PowerMeasure($value, $unit);
            case Pressure::class:
                return new PressureMeasure($value, $unit);
            case RadiationDoseAbsorbed::class:
                return new RadiationDoseAbsorbedMeasure($value, $unit);
            case RadiationDoseEffective::class:
                return new RadiationDoseEffectiveMeasure($value, $unit);
            case RadioactiveActivity::class:
                return new RadioactiveActivityMeasure($value, $unit);
            case Ratio::class:
                return new RatioMeasure($value, $unit);
            case SolidAngle::class:
                return new SolidAngleMeasure($value, $unit);
            case Temperature::class:
                return new TemperatureMeasure($value, $unit);
            case Velocity::class:
                return new VelocityMeasure($value, $unit);
            case Volume::class:
                return new VolumeMeasure($value, $unit);
            default:
                throw new \InvalidArgumentException(
                    sprintf('Unknown quantity "%s" for unit "%s".', get_class($unit->getQuantity()), $unit->getSymbol())
                );
        }
    }
}
