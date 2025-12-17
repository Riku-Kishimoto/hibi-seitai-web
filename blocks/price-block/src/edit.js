import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    RichText
} from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { title, leadText, sections } = attributes;

    const blockProps = useBlockProps({
        className: 'fee'
    });

    // セクションのタイトル変更
    const updateSectionTitle = (value, index) => {
        const newSections = [...sections];
        newSections[index].title = value;
        setAttributes({ sections: newSections });
    };

    // 各行の left / right 変更処理
    const updateRow = (index, rowIndex, key, value) => {
        const newSections = [...sections];
        newSections[index].rows[rowIndex][key] = value;
        setAttributes({ sections: newSections });
    };

    return (
        <section {...blockProps}>
            <div className="fee__inner">

                {/* タイトル */}
                <div className="fee__title">
                    <RichText
                        tagName="span"
                        value={title}
                        onChange={(value) => setAttributes({ title: value })}
                    />
                </div>

                {/* リード文 */}
                <div className="fee__content">
                    <RichText
                        tagName="p"
                        value={leadText}
                        onChange={(value) => setAttributes({ leadText: value })}
                    />
                </div>

                <div className="fee__list">
                    {sections.map((section, index) => (
                        <div className="fee__item" key={section.id}>

                            <div className="explanation explanation--fee">
                                <RichText
                                    tagName="h4"
                                    className="explanation__title explanation__title--fee"
                                    value={section.title}
                                    onChange={(value) => updateSectionTitle(value, index)}
                                />
                            </div>

                            {section.rows.map((row, rowIndex) => (
                                <div className="fee__table fee__table--long" key={row.id}>
                                    <RichText
                                        tagName="p"
                                        value={row.left}
                                        onChange={(value) =>
                                            updateRow(index, rowIndex, 'left', value)
                                        }
                                    />
                                    <RichText
                                        tagName="p"
                                        className="fee__price"
                                        value={row.right}
                                        onChange={(value) =>
                                            updateRow(index, rowIndex, 'right', value)
                                        }
                                    />
                                </div>
                            ))}

                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}