<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diners_transaction".
 *
 * @property string $fecha
 * @property string $hora
 * @property string $orden
 * @property string $marca
 * @property string $subtotal
 * @property string $iva
 * @property string $impuesto
 * @property string $interes
 * @property string $total
 * @property string $autorizacion
 * @property string $ruc
 * @property string $credito
 * @property integer $meses
 * @property string $estado
 * @property string $conciliado
 * @property string $extra
 */
class DinersTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diners_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'orden', 'marca', 'subtotal', 'iva', 'impuesto', 'interes', 'total', 'autorizacion', 'ruc', 'credito', 'meses', 'estado', 'extra'], 'required'],
            [['meses'], 'integer'],
            [['fecha'], 'string', 'max' => 8],
            [['hora'], 'string', 'max' => 6],
            [['orden', 'autorizacion', 'extra'], 'string', 'max' => 255],
            [['marca'], 'string', 'max' => 3],
            [['subtotal', 'iva', 'impuesto', 'interes', 'total'], 'string', 'max' => 50],
            [['ruc'], 'string', 'max' => 13],
            [['credito'], 'string', 'max' => 2],
            [['estado', 'conciliado'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'orden' => 'Orden',
            'marca' => 'Marca',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'impuesto' => 'Impuesto',
            'interes' => 'Interes',
            'total' => 'Total',
            'autorizacion' => 'Autorizacion',
            'ruc' => 'Ruc',
            'credito' => 'Credito',
            'meses' => 'Meses',
            'estado' => 'Estado',
            'conciliado' => 'Conciliado',
            'extra' => 'Extra',
        ];
    }
}
